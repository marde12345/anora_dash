<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUpgradeRole extends Model
{
    use HasFactory;
    protected $casts = [
        'read_at' => 'datetime',
        'action_at' => 'datetime',
    ];
    protected $guarded = []; //tambahkan baris ini
}
