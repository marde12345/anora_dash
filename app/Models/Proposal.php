<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    private const STATUS = ['submitted', 'review', 'invited', 'accepted', 'rejected'];
}
