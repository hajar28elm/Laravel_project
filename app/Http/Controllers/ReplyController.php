<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storereplies(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            $reply = new Reply();
            $reply->student_id = $data['student_id'];
            $reply->comment_id = $data['comment_id'];
            $reply->contenu = $data['contenu'];
            $reply->save();
             return response()->json([
             'success' => true,
             'reply' => [
             'image' => $reply->Student->img,
             'author' => $reply->Student->name,
             'content' => $reply->contenu,
              'date' => $reply->created_at->format('Y-m-d H:i:s')
        ]
    ]);
}
}


}
