<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable =[
        'user_id',
        'poll_id',
        'option_id'
    ];

    use HasFactory;
}
