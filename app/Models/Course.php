<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

class Course extends Model
{
    use HasFactory;

    public function page()
    {
        return $this->hasMany(Page::class);
    }
}
