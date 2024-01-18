<?php

namespace App\Http\Controllers;

use App\Models\photos;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Image = new ImageManager(new Driver());
        $request->file('photo');
        $new_name = Str::random(5).time().".".$request->file('photo')->getClientOriginalExtension();
        $image = $Image->read($request->file('photo'))->resize(720,400);
        $image->save(('dashboard-assets/photos/'.$new_name),quality: 30);

        photos::insert([
            'photos' => $new_name,
        ]);
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(photos $photos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(photos $photos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, photos $photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(photos $photos)
    {
        //
    }
}
