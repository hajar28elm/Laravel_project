<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;

class Lesson extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'contenu',
        'duration',
        'chapter_id',
    ];

    public function chapitre()
    {
        return $this->belongsTo(Chapter::class,'chapter_id');
    }

}
