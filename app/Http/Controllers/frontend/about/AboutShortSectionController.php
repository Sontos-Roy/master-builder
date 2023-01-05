<?php

namespace App\Http\Controllers\frontend\about;

use App\Http\Controllers\Controller;
use App\Models\AboutShortSection;
use Illuminate\Http\Request;

class AboutShortSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['aboutshortsec'] = AboutShortSection::all();
        return view("backend.about.aboutshortsec.index", $this->data);
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
            'title'=>'required',
            'description' => 'required'
        ]);

        AboutShortSection::create($data);
        // return redirect()->route("aboutshortsec.index")->with("success", $request->title." Section Created Successfully");
        return response()->json(['status' => true, 'msg' => 'Section Created Successfully']);
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
            'description' => 'required'
        ]);

        AboutShortSection::find($id)->update($data);

        // return redirect()->route("aboutshortsec.index")->with("success", $request->title. " Section Updated Successfully");
        return response()->json(['status' => true, 'msg' => 'Section Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutShortSection::find($id)->delete();

        return redirect()->route("aboutshortsec.index")->with("delete", "Section Deleted Successfully");
    }   
}
