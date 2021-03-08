<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    public const STATUS = [
        'submitted' => 'Submitted',
        'review' => 'Review',
        'invited' => 'Invited',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected'
    ];

    protected $guarded = []; //tambahkan baris ini

}
