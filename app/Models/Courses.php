<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chapter;
use App\Models\Inscription;

class courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'logo',
        'description',
        'longdescription',
        'prix',
        'solde',
        'category_id',
        'trainer_id'
    ];

    public function chapitres()
    {
        return $this->hasMany(Chapter::class);
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class,'course_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class,'course_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function wishlists(){
        return $this->belongsToMany(WishList::class);
    }
}
