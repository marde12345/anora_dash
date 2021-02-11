<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public const STATUS = ['settlement', 'pending', 'deny', 'expire', 'cancel'];
    public const TYPES = [
        "cimb_clicks", "bca_klikbca", "bca_klikpay", "bri_epay",
        "echannel", "permata_va", "bca_va", "bni_va", "bri_va", "other_va",
        "gopay", "indomaret", "danamon_online", "akulaku", "shopeepay"
    ];

    protected $guarded = []; //tambahkan baris ini

}
