<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Checkout\Session as CheckoutSession;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\orderMail;

use DB;
use Str;


class PaymentController extends Controller
{
    public function createCheckoutSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $cart = session()->get('cart', []);
    
        $lineItems = [];
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['product_title'],
                    ],
                    'unit_amount' => $item['price'] * 100, // Price in cents
                ],
                'quantity' => $item['quantity'],
            ];
        }
    
        try {
            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ]);
    
            // Correct response format
            return response()->json(['id' => $session->id]);
        } catch (\Exception $e) {
            // Log and return error response
            \Log::error('Stripe error:', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success()
    {
        {
            $customer_info = session()->get('customer_data');
            $cart_data = session()->get('cart');
            if (!$customer_info) {
                return redirect()->route('payment.cancel')->with('error', 'Customer information not found.');
            }
            $customer = Customer::where('email', $customer_info['email'])->first();
            if (!$customer) {
                $customer = new Customer();
                $customer->name = $customer_info['name'];
                $customer->email = $customer_info['email'];
                $customer->address = $customer_info['address'];
                $customer->phone = $customer_info['phone'];
                $customer->zipcode = $customer_info['zipcode'];
                $customer->save();
            }
            $orderNumber = 'GL-' . mt_rand(100000, 999999);

            foreach ($cart_data as $id => $products_info) {
                $order = new Order();
                $order->status = 'pending';
                $order->order_date = now(); 
                $order->order_no = $orderNumber; 
                $order->customer_id = $customer->id;
                $order->product_id = $products_info['product_id']; 
                $order->quantity  = $products_info['quantity'];
                $order->total_price = $products_info['total'];
                $order->save();
            }
                 
            Mail::to($customer_info['email'])->send(new orderMail($orderNumber,$cart_data));
            session()->forget('cart');
            session(['orderNumber' => $orderNumber]);
          
            return redirect()->route('order.success');
            }
           
    
    }


    public function orderSuccess(){
        
    $orderNumber = session('orderNumber');
    
    $orderDetails = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->where('orders.order_no', $orderNumber)
        ->select('customers.*', 'products.*', 'orders.*')
        ->get();   
        $itemsArray = $orderDetails->all();
        session()->forget('orderNumber');

        return view('pages.guest.order-success',['itemsArray' => $itemsArray]);
        


    }

    public function cancel()
    {
        // Handle cancel
        return view('payment.cancel');
    }
}
