<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Courses;
use App\Models\Inscription;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'img',
        'email',
        'password',
    ];
    public function courses()
    {
        return $this->belongsToMany(Courses::class);
    }
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
