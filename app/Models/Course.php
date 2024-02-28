<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'instructor_id',
    ];
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
