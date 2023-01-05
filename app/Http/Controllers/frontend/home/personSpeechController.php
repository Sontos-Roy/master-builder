<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\QuatSection;
use Illuminate\Http\Request;

class personSpeechController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['quat']= QuatSection::all()->first();
        return view('backend.home.quatsec.index', $this->data);
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
            'persor_speech' => 'required',
            'persor_name' => 'required',
            'persor_designation' => 'required',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('feature_image')) {
            $originName = $request->file('feature_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileName ='brand_'.'.'.$extension;

            $request->file('feature_image')->move(public_path('images/feature_image/'), $fileName);
            $feature_image=$fileName;
        }
        $data['feature_image'] = $feature_image;
        QuatSection::create($data);

        return response()->json(['status'=> true, 'msg' => 'Created Successfully']);
        // return back()->with('success', "Data Created Successfully");


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
        // dd($request->all());
        $data = $request->validate([
            'persor_speech' => '',
            'persor_name' => '',
            'persor_designation' => '',
            'feature_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('feature_image')) {
            // deleteImage('images/cover/', $request->feature_image);
            $image_path = "images/feature_image/".$request->feature_image;

            if (file_exists($image_path)) {

                unlink($image_path);

            }
            $originName = $request->file('feature_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('feature_image')->getClientOriginalExtension();
            $fileName ="brand_".'.'.$extension;

            $request->file('feature_image')->move(public_path('images/feature_image/'), $fileName);
            $data['feature_image'] = $fileName;
        }
        QuatSection::find($id)->update($data);

        return response()->json(['status'=> true, 'msg' => 'Updated Successfully']);
        // return back()->with('success', "Data Updated Successfully");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = QuatSection::find($id);
        deleteImage('feature_image', $delete->feature_image);
        $delete->delete();
        return back()->with('delete',"Deleted Successfully");
    }
}
