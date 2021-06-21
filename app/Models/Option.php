<?php

namespace App\Models;

use App\Models\Poll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function poll() {
    return $this->belongsTo(Poll::class);
    }
}
