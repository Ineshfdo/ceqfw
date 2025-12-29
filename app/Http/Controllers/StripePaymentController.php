<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('stripe.pay');
    }

    public function checkout()
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $cart = session()->get('cart', []);
        
        if(empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $lineItems = [];
        foreach($cart as $id => $details) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $details['name'],
                    ],
                    'unit_amount' => $details['price'] * 100, // Convert to cents
                ],
                'quantity' => $details['quantity'],
            ];
        }

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('stripe.success'),
            'cancel_url' => route('stripe.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success()
    {
        session()->forget('cart');
        return view('stripe.success');
    }

    public function cancel()
    {
        return view('stripe.cancel');
    }
}
