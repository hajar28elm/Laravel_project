<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();

        return view('admin.categories.index',compact('categories'));
    }
     
    public function create()
    {
        return view('admin.categories.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required',
            'name' => 'required',
        ]);
        Categorie::create($request->all());
        return redirect()->route('admin.categories.index')
          ->with('success','Category created successfully');
    }

   
    public function show(Categorie $categorie)
    {
        return view('admin.categories.show',compact('categorie'));
    }

   
    public function edit(Categorie $categorie)
    {
        return view('admin.categories.edit',compact('categorie'));
    }

   
    public function update(Request $request,Categorie $categorie)
    {
        $request->validate([

        ]);
        $categorie->update($request->all());
        return redirect()->route('admin.categories.index')
             ->with('success','Category updated successfully');

    }

    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('admin.categories.index')
             ->with('success','Category deleted successfully');
    }
}
