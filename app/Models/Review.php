<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // WARNING
    // Disini FK st_user_id refer ke user

    use HasFactory;
    protected $guarded = []; //tambahkan baris ini
}
