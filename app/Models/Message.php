<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $casts = [
        'read_at' => 'datetime',
        'id' => 'string'
    ];
    protected $guarded = []; //tambahkan baris ini

}
