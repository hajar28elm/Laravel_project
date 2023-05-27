<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'question',
    ];
    public function answer()
    {
        return $this->hasOne(Answers::class);
    }
    public function test()
    {
        return $this->belongsTo(Test::class,'test_id');
    }
    
}
