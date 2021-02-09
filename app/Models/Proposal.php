<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public const STATUS = ['submitted', 'review', 'invited', 'accepted', 'rejected'];

    protected $guarded = []; //tambahkan baris ini

}
