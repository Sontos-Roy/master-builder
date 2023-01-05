<?php

namespace App\Http\Controllers\frontend\sections;

use App\Http\Controllers\Controller;
use App\Models\OtherSection;
use App\Models\QuatSection;
use App\Models\secName;
use Illuminate\Http\Request;

class OtherSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['sec_name'] = secName::all();
        $this->data['sections_info'] = OtherSection::all();
        return view("backend.sections.OtherSections", $this->data);
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
            'sec_name' => 'required',
            'sec_title' => 'required',
            'sec_des' => '',
            'sec_des2' => '',
            'section_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $create = OtherSection::create($data);

        createImage($create, 'images/sections', 'section_image', $request, 'section_');


        return redirect()->route('other_sec.index')->with('success', 'Data Created Successfully');
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
        $this->data['sec_name'] = secName::all();
        $this->data['section_info'] = OtherSection::find($id);
        return view('backend.sections.edit', $this->data);
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
        $data= $request->validate([
            'sec_name' => 'required',
            'sec_title' => 'required',
            'sec_des' => '',
            'sec_des2' => '',
            'section_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $fileName = updateImage('images/sections', 'section_image', $request, 'section_', $id);
        if($request->hasFile('section_image')){
            $data['section_image'] = $fileName;
        }

        OtherSection::find($id)->update($data);

        return redirect()->route('other_sec.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OtherSection::find($id)->delete();
        deleteImage("images/sections", $id);

        return back()->with('delete', 'Data Deleted Successfully');
    }
}
