<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Acheivement;
use Illuminate\Http\Request;

class LessonsController extends Controller
{
   public function fetchlesson(Request $request){
    if($request->ajax()){
         $data = $request->all();
         $lesson = Lesson::where(['id' =>  $data['id']])->first();
         $url = $lesson->contenu;
         $id=$lesson->id;
         $countacheivement = Acheivement::countAcheivement($data['id']);
         if($countacheivement == 0){
         $acheivement = new Acheivement();
         $acheivement->student_id = $data['student_id'];
         $acheivement->lesson_id=$data['id'];
         $acheivement->save();
         }
         return response()->json(['action' => 'display' , 'videoUrl' => $url , 'lesson_id' => $id ]);
      }
   }
}
