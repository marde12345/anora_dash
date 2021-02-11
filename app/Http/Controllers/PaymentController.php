<?php

namespace App\Http\Controllers;

use App\Models\Payment;
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
            'transaction_details' => [
                'order_id' => 'PY-FAS-123123',
                'gross_amount' => 2000,
            ],
            'customer_details' => [
                'first_name' => 'Marde',
                'last_name' => 'Fasma',
                'email' => 'mardefasma123up@gmail.com',
                // 'phone' => '088226344167',
            ],
            "item_details" => [
                [
                    "id" => "FAS-123123",
                    "quantity" => 1,
                    "price" => 2000,
                    "name" => "Job Name",
                    "category" => "Data Entry",
                ],
            ],
            'enabled_payments' => Payment::TYPES,
        );
        $snapToken = \Midtrans\Snap::createTransaction($params);
        return response()->json($snapToken);
    }

    public function handlingNotif(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;

        if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
        }
    }

    public function finish()
    {

        $widget = [
            'title' => "Pembayaran Berhasil",
        ];

        return view('payment.finish', compact('widget'));
    }

    public function unfinish()
    {

        $widget = [
            'title' => "Pembayaran Berhasil",
        ];

        return view('payment.unfinish', compact('widget'));
    }

    public function error()
    {

        $widget = [
            'title' => "Pembayaran Berhasil",
        ];

        return view('payment.error', compact('widget'));
    }
}
