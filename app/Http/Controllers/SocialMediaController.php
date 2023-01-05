<?php

namespace App\Http\Controllers;

use App\Models\socialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['social'] = socialMedia::all();
        return view("backend.social.social", $this->data);
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
            'facebook' => 'required_without_all:twitter, instagram, googleplus, youtube',
            'twitter' => 'required_without_all:facebook, instagram, googleplus, youtube',
            'instagram' => 'required_without_all:facebook, twitter, googleplus, youtube',
            'googleplus' => 'required_without_all:facebook, twitter, instagram, youtube',
            'youtube' => 'required_without_all:facebook, twitter, instagram, googleplus',
        ]);

        socialMedia::create($data);

        return response()->json(['status' => true, 'msg', 'Social Media Created successfully']);
        // return redirect()->route("social.index")->with("success", "Social Media Created successfully");
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
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'googleplus' => '',
            'youtube' => '',
        ]);
        socialMedia::find($id)->update($data);
        
        return response()->json(['status' => true, 'msg', 'Social Media Updated successfully']);
        // return redirect()->route("social.index")->with("success", "Social Media Updated Successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        socialMedia::find($id)->delete();

        return redirect()->route("social.index")->with("delete", "Social Media Deleted Successfully");
    }
}
