<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Done_job extends Model
{
    use HasFactory;

    public const STATUS = ['submitted', 'rejected', 'approval'];

    protected $guarded = []; //tambahkan baris ini
}
