<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class MasterController extends Controller
{
    public function getCategories(){
        $categories = Categorie::all();
        return $categories;
    }
    
}
