<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'logo',
        'name',
    ];
    
    public function courses()
    {
        return $this->hasMany(Courses::class,'category_id');
    }
}
