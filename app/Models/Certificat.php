<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Certificat extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'course_id',
    ];
    public function countCertificat($courseid){
        $countCertificat = Certificat::where(['student_id' => Auth::user()->id,'course_id'=> $courseid])->count();
        return $countCertificat;

    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Courses::class);
    }
}
