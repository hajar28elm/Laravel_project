<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function storestory(Request $request)
    {
          if($request->ajax()){
            $data = $request->all();
            $story = new Story();
            $story->student_id = $data['student_id'];
            $story->contenu = $data['contenu'];
            $story->save();
             return response()->json([
             'success' => true,
             'story' => [
              'image' => $story->student->img,
             'id' => $story->id,
             'author' => $story->student->name,
             'student'=> $story->student->id,
             'content' => $story->contenu,
              'date' => $story->created_at->format('Y-m-d H:i:s')
        ]
    ]);
}
    }

    public function destroy($id)
    {
        $story = Story::find($id);
        $story->delete();
        return response()->json(['success' => true]);
    }
}
