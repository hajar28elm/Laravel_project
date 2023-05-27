<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer_text1',
        'answer_text2',
        'correct_answer',
        'question_id'
    ];
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
}
