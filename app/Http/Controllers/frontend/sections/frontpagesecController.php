<?php

namespace App\Http\Controllers\frontend\sections;

use App\Http\Controllers\Controller;
use App\Models\frontpageCover;
use App\Models\Pages;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\File;

class frontpagesecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['cover_section'] = frontpageCover::all();
        $this->data['page_title'] = "All Cover Sections";

        return view('backend.coversections.allSections', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pages'] = Pages::all();
        return view('backend.coversections.create', $this->data);
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
            'page_name' => 'required',
            'cover_title' => 'required',
            'cover_des' => '',
            'cover_des2' => '',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $create = frontpageCover::create($data);
        if($request->hasFile('background_image')) {
            $originName = $request->file('background_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('background_image')->getClientOriginalExtension();
            $fileName ='cover_'.$create->id.'.'.$extension;

            $request->file('background_image')->move(public_path('images/cover/'), $fileName);

            $create->background_image = $fileName;
            $create->save();
        }


        return redirect()->route('coversection.index')->with('success', 'Data Created Successfully');
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
        $this->data['data'] = frontpageCover::findOrFail($id);
        $this->data['pages'] = Pages::all();

        return view('backend.coversections.edit', $this->data);
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
            'page_name' => 'required',
            'cover_title' => 'required',
            'cover_des' => '',
            'cover_des2' => '',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('background_image')) {
            // deleteImage('images/cover/', $request->background_image);
            $image_path = "images/cover/".$request->background_image;

            if (file_exists($image_path)) {

                unlink($image_path);

            }
            $originName = $request->file('background_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('background_image')->getClientOriginalExtension();
            $fileName ="cover_".$request->id.'.'.$extension;

            $request->file('background_image')->move(public_path('images/cover/'), $fileName);
            $data['background_image'] = $fileName;
        }
        frontpageCover::find($id)->update($data);
        return redirect()->route('coversection.index')->with('success', 'Data Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
