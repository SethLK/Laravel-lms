<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    // Define other attributes and methods

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
