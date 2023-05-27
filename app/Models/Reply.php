<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenu',
        'comment_id',
        'student_id',
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    public function Student()
    {
        return $this->belongsTo(Student::class,'student_id');
}
}
