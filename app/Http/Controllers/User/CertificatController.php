<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Certificat;
use App\Models\Student;
use App\Models\Courses;
use App\Models\Acheivement;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Auth;
use PDF;

class CertificatController extends Controller
{
   public function checkCertificate(Request $request){
    if($request->ajax()){
        $data = $request->all();
        $course = Courses::where(['id' => $data['course_id']])->first();
        $id = $course->id;
        $chapters =Chapter::where(['courses_id' => $data['course_id']])->get();
        $clesson=0;
         foreach ($chapters as $chapter) {
                $clesson = $clesson + $chapter->lessons->count();
         }
         
        $achievements = Acheivement::where(['student_id' => Auth::user()->id])->get();
        $countAchievement = 0;
        foreach ($achievements as $achievement) {
            $lesson = $achievement->lesson;
            $chapter = $lesson->chapitre;
            if ($chapter->courses_id == $data['course_id']) {
                $countAchievement++;
            }
        }
        $certificate = new Certificat();
          if($countAchievement == $clesson){
            $condition= true;
             $countCertificat = Certificat::where(['student_id' => Auth::user()->id,'course_id'=> $data['course_id']])->count();
            if($countCertificat == 0)
            $certificate->course_id = $data['course_id'];
            $certificate->student_id = $data['student_id'];
            $certificate->save();
         }
           return response()->json(['condition' => $condition , 'course_id' => $id]);
       

   }
}
    public function generateCertificate($id)
    {
    $student = Student::where(['id' => Auth::user()->id])->first();
    $course = Courses::where(['id' => $id])->first();
    $pdf = PDF::loadView('certificat.certificate', ['name' => $student->name, 'course' => $course->nom]);
    return $pdf->download('certificat.pdf');
    }
}
