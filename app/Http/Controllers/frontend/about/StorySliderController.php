<?php

namespace App\Http\Controllers\frontend\about;

use App\Http\Controllers\Controller;
use App\Models\Story_slider;
use Illuminate\Http\Request;

class StorySliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['story_slider'] = Story_slider::all();
        return view("backend.about.story.index", $this->data);
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
            'image' => 'required',
        ]);
        $create = Story_slider::create($data);
        createImage($create, 'images/story_slider', 'image', $request, 'slider_');
        // return redirect()->route("story_slider.index")->with("success", "Story Slider Created Successfully");
        return response()->json(['status' => true, 'msg' => 'Story Slider Created Successfully', 'url' => route('story_slider.index')]);
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
            'image' => 'required'
        ]);
        $fileName = updateImage('images/story_slider', 'image', $request, 'slider_', $id);
        if($request->hasFile('image')){
            $data['image'] = $fileName;
        }
        Story_slider::find($id)->update($data);
        // return redirect()->route('story_slider.index')->with("success", 'Story Slider Updated Successfully');
        return response()->json(['status' => true, 'msg' => 'Story Slider Updated Successfully', 'url' => route('story_slider.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Story_slider::find($id);
        deleteImage("story_slider", $delete->image);
        $delete->delete();
        return redirect()->route("story_slider.index")->with("delete", "Core Values Deleted Successfully");
    }
    function multidelete(Request $request){
        foreach($request->mark as $mark){
            Story_slider::find($mark)->delete();
        }
        return back();
    }
}
