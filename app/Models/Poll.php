<?php

namespace App\Models;

use App\Models\Option;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;

    public function options() {
        return $this->hasMany(Option::class);
        }

        protected $fillable = [
            'name',
            'description',
            'single_choice',
            'user_id'
        ];
}
