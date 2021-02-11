<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $payment_time = $this->created_at->isoFormat('DD MMMM Y, H:mm:ss');
        return parent::toArray($request) + [
            'payment_time' => $payment_time,
            'gross_amount_rp' => $this->rupiah($this->gross_amount),
        ];
    }

    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
}
