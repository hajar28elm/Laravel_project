<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Courses;

class Inscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
        'date_inscription',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
