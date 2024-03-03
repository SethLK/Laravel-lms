<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
    ];

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
