<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Acheivement extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'lesson_id',
    ];
    public function countAcheivement($id){
        $countacheivement = Acheivement::where(['student_id' => Auth::user()->id,'lesson_id' => $id])->count();
        return $countacheivement;
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class,'lesson_id');
    }

}
