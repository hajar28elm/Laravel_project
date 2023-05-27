<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class LessonsController extends Controller
{
    
    public function index($chapterId)
    {
        $chapter = Chapter::findOrFail($chapterId);
        $lessons = $chapter->lessons;
        return view('admin.lessons.index',compact('lessons','chapter'));
    }

    
    public function create($chapterId)
    {
        $chapter = Chapter::find($chapterId);
        return view('admin.lessons.create',compact('chapter'));
    }

    
    public function store(Request $request)
    {
        // $videoPath = $request->file('video')->getPathname();
    
        // Appeler la fonction pour récupérer la durée de la vidéo
        //  $videoDuration = $this->getVideoDuration($videoPath);
        $lesson = new Lesson();
        $lesson->title = $request->input('title');
        $lesson->description = $request->input('description');
        $lesson->duration = $request->input('duration');
        $lesson->chapter_id = $request->input('chapter_id');
        $file = $request->file('contenu');
        $fileName = $file->getClientOriginalName();
            // Déplacer le fichier vers le répertoire de stockage
        // $file->storeAs('public/videos', $fileName);
            // Mettre à jour le nom du fichier vidéo dans le modèle Lesson
        $lesson->contenu = $fileName;
        // Autres attributs...
        
        // Assigner la durée de la vidéo
        // $student->duration = $videoDuration;
        
        // Sauvegarder l'instance de Student
        $lesson->save();
        return redirect()->route('admin.lessons.index',['chapterId' => $request->chapter_id])
          ->with('success','Lesson created successfully');
    }

  
    public function show(Lesson $lesson)
    {
        //
    }

   
    public function edit(Lesson $lesson)
    {
        return view('admin.lessons.edit',compact('lesson'));
    }

    
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([

        ]);
        // if ($lesson->contenu) {
        //     Storage::delete('public/videos/' . $lesson->contenu);
        // }
        if ($request->hasFile('contenu')) {
            $file = $request->file('contenu');
            $fileName = $file->getClientOriginalName();
            // $file->storeAs('public/videos', $fileName);
            $lesson->contenu = $fileName;
        }
        $lesson->update($request->all());
        return redirect()->route('admin.lessons.index',['chapterId' => $lesson->chapter_id])
             ->with('success','lesson updated successfully'); 
    }

    public function destroy(Lesson $lesson)
    {
        $id=$lesson->chapter_id;
        $lesson->delete();
        return redirect()->route('admin.lessons.index',['chapterId' => $id])
             ->with('success','Lesson deleted successfully');
    }
}
