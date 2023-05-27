<?php

namespace App\Http\Controllers;

use App\Models\aboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutUs::first();
        return view('about.index', compact('about'));
    }
    

    public function about()
    {
        $about = AboutUs::first();
        return view('user.about.index', compact('about'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(aboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(aboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aboutUs $aboutUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\aboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(aboutUs $aboutUs)
    {
        //
    }
}
