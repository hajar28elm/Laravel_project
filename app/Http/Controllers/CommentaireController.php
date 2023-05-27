<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    
    public function index(){
        $comments = Commentaire::all();

        return view('user.comments.index',compact('comments'));
    }
    public function storecomments(Request $request)
    {
          if($request->ajax()){
            $data = $request->all();
            $commentaire = new Commentaire();
            $commentaire->student_id = $data['student_id'];
            $commentaire->course_id = $data['course_id'];
            $commentaire->contenu = $data['contenu'];
            $commentaire->save();
             return response()->json([
             'success' => true,
             'comment' => [
             'image' => $commentaire->Student->img,
             'id' => $commentaire->id,
             'author' => $commentaire->Student->name,
             'content' => $commentaire->contenu,
              'date' => $commentaire->created_at->format('Y-m-d H:i:s')
        ]
    ]);
}
}



 // $request->validate([
        //     'student_id' => 'required',
        //     'course_id' => 'required',
        //     'contenu' => 'required',
        // ]);
        // Commentaire::create($request->all());
        // return redirect()->route('dashboard.comments.index');
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commentaire  $commentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
