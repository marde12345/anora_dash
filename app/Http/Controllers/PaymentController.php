<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
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
    public function getRandomPayment()
    {
        return $this->createTransaction(Payment::inRandomOrder()->limit(1)->first());
    }

    public function createTransaction(Payment $payment)
    {
        $params = array(
            'transaction_details' => [
                'order_id' => $payment->payment_id,
                'gross_amount' => $payment->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $payment->customer_name,
                'last_name' => $payment->customer_last_name,
                'email' => $payment->customer_email,
                // 'phone' => '088226344167',
            ],
            "item_details" => [
                [
                    "id" => $payment->job_number_contract,
                    "quantity" => 1,
                    "price" => $payment->gross_amount,
                    "name" => $payment->job_name,
                    "category" => $payment->job_category,
                ],
            ],
            'enabled_payments' => Payment::TYPES,
        );
        // dd($payment);
        $snapToken = \Midtrans\Snap::createTransaction($params);
        return response()->json($snapToken);
    }

    public function handlingNotif(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;

        $payment = Payment::where('payment_id', $order_id)->first();
        $payment->payment_status = $transaction;
        $payment->payment_type = $type;
        $payment->save();

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

    public function finish(Request $request)
    {
        $order_id = $request->order_id;
        $payment = new PaymentResource(Payment::where('payment_id', $order_id)->first());
        $payment = json_decode(json_encode($payment));
        // dd($payment);
        $widget = [
            'title' => "Pembayaran Berhasil",
            'payment' => $payment,
        ];

        return view('payment.finish', compact('widget'));
    }

    public function finishCaptha(Request $request)
    {
        $order_id = $request->order_id;

        $widget = [
            'title' => "Pembayaran Berhasil",
            'order_id' => $order_id,
        ];

        return view('payment.finish_captha', compact('widget'));
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
