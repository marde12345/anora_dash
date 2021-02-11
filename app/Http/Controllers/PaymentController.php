<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('custom.midtrans_server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('custom.midtrans_is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
    }

    public function createTransaction()
    {
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 2000,
            ),
            'customer_details' => array(
                'first_name' => 'Marde',
                'last_name' => 'Fasma',
                'email' => 'mardefasma123up@gmail.com',
                'phone' => '088226344167',
            ),
        );
        $snapToken = \Midtrans\Snap::createTransaction($params);
        return response()->json($snapToken);
    }

    public function done()
    {

        $widget = [
            'title' => "Pembayaran Berhasil",
        ];

        return view('payment.done', compact('widget'));
    }
}
