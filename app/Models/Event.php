<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'contenu',
        'img',
        'name',
        'longcontent'
        
    ];
    public function countEvent(){
        $count = Event::all()->count();
        return $count;
    }
}
