<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ReadEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'student_id',
        'event_id',
        
    ];
    public function countreadEvent(){
        $countread = ReadEvent::where(['student_id' => Auth::user()->id])->count();
        return $countread;
    }
    public function checkEvent($id){
        $check = ReadEvent::where(['student_id' => Auth::user()->id,'event_id' => $id])->count();
        return $check;
    }
}
