<?php

namespace App\Http\Controllers\Extranet;

use App\Http\Controllers\Controller;
use App\Models\slide;
use Illuminate\Http\Request;

class ExtranetPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = slide::where('slide','principal')->get();
        return view('extranet.welcome',compact('fotos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login_page()
    {
        return view('extranet.login');
    }
    public function login()
    {
        return view('extranet.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
