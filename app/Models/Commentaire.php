<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenu',
        'student_id',
        'course_id',
    ];

    public function Student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class,'comment_id');
    }
}
