<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transaction';

    protected $fillable = [
        'type',
        'category',
        'create_date',
        'amount',
        'total',
        'comments',
        'user_email'
    ];

}
