<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
class orderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $cart_data;
    protected $orderNumber;

    
    public function __construct($orderNumber,$cart_data)
    {
        $this->orderNumber = $orderNumber;
        $this->cart_data = $cart_data;
    }

    
    public function build()
    {
       
        $orderDetails = Order::where('order_no',$this->orderNumber)->first();

        // dd($orderDetails->toArray());
        return $this->view('pages.guest.order-mail-template')->subject('Your Order Details')->with([
                        'orderDetails' => $orderDetails->toArray(),
                        'cart_data' => $this->cart_data,
                    ]);
    }
}
