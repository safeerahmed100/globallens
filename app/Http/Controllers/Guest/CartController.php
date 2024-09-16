<?php

namespace App\Http\Controllers\Guest;
use App\Http\Controllers\Controller;
use App\Models\Product;



use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product_qty = $request->input('quantity', 1); // Default quantity is 1 if not specified
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->route('home')->with('error', 'Product not found.');
        }
    
        $cart = session()->get('cart', []);
    
        // Check if the product is already in the cart
        if (isset($cart[$id])) {
            // Update the quantity and total price if the product is already in the cart
            $cart[$id]['quantity'] += $product_qty;
            $cart[$id]['total'] = $cart[$id]['quantity'] * $product->price;
        } else {
            // Add the product to the cart with the specified quantity
            $cart[$id] = [
                'product_id'=>$id,
                'product_title' => $product->product_title,
                'price' => $product->price,
                'quantity' => $product_qty,
                'total' => $product_qty * $product->price,
            ];
        }
    
        // Save the updated cart to the session
        session()->put('cart', $cart);
    
        return redirect()->route('cart.show')->with('success', 'Product added to cart!');
       
    }

    public function populateCart(){
        $cartCount = count(session('cart', []));
            return response()->json(['cartCount' => $cartCount]);
        }
    
    public function showCart()
    {
        $cart = session()->get('cart', []);       
       
        return view('/pages/guest/cart', compact('cart'));
    }

    public function removeFromCart($id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item removed successfully');
    }

    return view('cart.index')->with('error', 'Item not Found');
}
    
}
