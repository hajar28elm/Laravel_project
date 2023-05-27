<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
    ];
    public static function countWishlist($course_id){
        $countWishlist = Wishlist::where(['student_id' => Auth::user()->id,'course_id' => $course_id])->count();
        return $countWishlist;
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class,'course_id');
    }
}
