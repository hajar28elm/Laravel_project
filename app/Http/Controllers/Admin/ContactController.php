<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contacts.index',compact('contacts'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(Contact $contact)
    {
        //
    }

   
    public function edit(Contact $contact)
    {
        //
    }

   
    public function update(Request $request, Contact $contact)
    {
        //
    }

    public function destroy(Contact $contact)
    {
        //
    }
}
