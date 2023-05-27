<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactUsController extends Controller
{
    public function index(){
        return view('ContactUs.index');
    }
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'telephone' => 'required',
        'pays' => 'required',
        'message' => 'required',
        ]);
        Contact::create($request->all());
        return redirect()->route('front.index')
          ->with('success','Message delivered successfully');
    }

}
