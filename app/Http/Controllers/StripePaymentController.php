<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use function Laravel\Prompts\alert;

class StripePaymentController extends Controller
{
    public function stripe(): View
    {
        return view('stripe.stripe');
    }

    public function stripePost(Request $request): RedirectResponse
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => 82 * 10,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Testing stripe payment"
        ]);
        return back()->with('success', 'Payment successful!');
    }
}

