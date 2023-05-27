<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'img',
        'specialty',
        'bio',
        'facebook',
        'instagram',
        'twitter',
    ];
    public function courses()
    {
        return $this->hasMany(Courses::class);
    }
}
