<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\brandImage;
use Illuminate\Http\Request;

class brandImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['brand_image'] = brandImage::all()->first();

        return view('backend.home.brandImage', $this->data);
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
        $data= $request->validate([
            'brandImage' => 'required | image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $create = brandImage::create($data);
        createImage($create, 'images/brandImage', 'brandImage', $request, 'brand_');

        return response()->json(['status' => true, 'msg' => 'Data Created Successfully']);
        // return back()->with('success', 'Data Create Successfull');


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
            'brandImage' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $fileName = updateImage('images/brandImage', 'brandImage', $request, 'brand_', $data);
        $data['brandImage'] = $fileName;
        brandImage::find($id)->update($data);   
        return response()->json(['status' => true, 'msg' => 'Data Updated Successfully']);
        // return redirect()->route('brandimage.index')->with("Update Image Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = brandImage::find($id);
        deleteImage("brandImage", $delete->brandImage);
        $delete->delete();
        return redirect()->route("brandimage.index")->with("delete", "Core Values Deleted Successfully");
    }
}
