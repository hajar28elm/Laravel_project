<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Courses;

class Chapter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'courses_id',
    ];

    public function cours()
    {
        return $this->belongsTo(Courses::class,'courses_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class,'chapter_id');
    }
}
