<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Chapa\Chapa\Facades\Chapa as Chapa;

class PaymentController extends Controller
{
    /**
     * Generate reference for payment.
     *
     * @var string
     */
    protected $reference;

    /**
     * Constructor to generate reference.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reference = Chapa::generateReference();
    }

    /**
     * Initialize Chapa payment process.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initialize(Request $request)
    {
        // Generate a payment reference
        $reference = $this->reference;

        // Enter the details of the payment
        $data = [
            'amount' => $request->amount,
            'email' => $request->email,
            'tx_ref' => $reference,
            'currency' => $request->currency,
            'callback_url' => route('callback', $reference),
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            "customization" => [
                "title" => 'Make a Payment',
                "description" => "Payment for services"
            ]
        ];

        // Initialize the payment with Chapa
        $payment = Chapa::initializePayment($data);

        // Redirect to Chapa checkout URL
        if ($payment['status'] !== 'success') {
            // Notify something went wrong
            return back()->with('error', 'Failed to initialize payment.');
        }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Handle callback after Chapa payment.
     *
     * @param  string  $reference
     * @return \Illuminate\Http\Response
     */
    public function callback($reference)
    {
        // Verify transaction with Chapa
        $data = Chapa::verifyTransaction($reference);

        // If payment is successful
        if ($data['status'] == 'success') {
            // Handle successful payment
            dd($data);
        } else {
            // Handle payment failure
            // Notify something went wrong
            dd($data);
        }
    }
}
