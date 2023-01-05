<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\HomeGallery;
use Illuminate\Http\Request;

class HomeGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['home_gallery'] = HomeGallery::all();
        return view('backend.home.gallery.index', $this->data);
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
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image'
        ]);

        $create = HomeGallery::create($data);

        createImage($create, 'images/home_gallery', 'image1', $request, 'image1_');
        createImage($create, 'images/home_gallery', 'image2', $request, 'image2_');
        createImage($create, 'images/home_gallery', 'image3', $request, 'image3_');

        return response()->json(['status' => true, 'msg' => 'Images Uploaded For Gallery Section']);
        // return back()->with('success', 'Data Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image1' => 'image',
            'image2' => 'image',
            'image3' => 'image'
        ]);

        $fileName1 = updateImage('images/home_gallery', 'image1', $request, 'image1_', $id);
        $fileName2 = updateImage('images/home_gallery', 'image2', $request, 'image2_', $id);
        $fileName3 = updateImage('images/home_gallery', 'image3', $request, 'image3_', $id);
        if($request->hasFile('image1')){
            $data['image1'] = $fileName1;
        }
        if($request->hasFile('image2')){
            $data['image2'] = $fileName2;
        }
        if($request->hasFile('image3')){
            $data['image3'] = $fileName3;
        }

        HomeGallery::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Images Updated Successful']);
        // return redirect()->route("home_gallery.index")->with("success", "Home Gallery Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = HomeGallery::find($id);

        deleteImage("home_gallery", $delete->image1);
        deleteImage("home_gallery", $delete->image2);
        deleteImage("home_gallery", $delete->image3);
        $delete->delete();
        return back()->with('delete', 'Data Deleted Successfully');
    }
}
