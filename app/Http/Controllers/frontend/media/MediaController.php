<?php

namespace App\Http\Controllers\frontend\media;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Media_Tag;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        $this->data['search'] = $search;
        if($search != ""){
            $this->data['gallery'] = Media::where('title', 'LIKE' , "%$search%")->orwhere('media_tag_id', 'LIKE' , "%$search%")->paginate(5)->appends($request->all());
        }else{
            $this->data['gallery'] = Media::paginate(5);
        }
        return view('backend.media.all', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['tags'] = Media_Tag::all();
        return view("backend.media.create", $this->data);
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
            'date'=>'required',
            'media_tag_id'=>'',
            'image'=>'required | image',
        ]);

        $create = Media::create($data);
        createImage($create, 'images/media', 'image', $request, 'media_');
        // return redirect()->route("media.index")->with("success", "Media Created Successful");
        return response()->json(['status'=>true, 'msg'=> 'Media Created Successful', 'url'=>route("media.index")]);
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
        $this->data['media'] = Media::findOrFail($id);
        $this->data['tags'] = Media_Tag::all();
        return view("backend.media.edit", $this->data);
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
            'title'=>'required',
            'date'=>'date',
            'media_tag_id'=>'',
            'image'=>'image',
        ]);

        $fileName = updateImage('images/media', 'image', $request, 'media_', $id);
        if($request->hasFile('image')){
            $data['image'] = $fileName;
        }
        Media::find($id)->update($data);
        // return redirect()->route("media.index")->with("success", "Media Updated Successful");
        return response()->json(['status'=>true, 'msg'=> 'Media Updated Successful', 'url'=>route("media.index")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Media::find($id);
        deleteImage("media", $delete->image);
        $delete->delete();
        return redirect()->route("media.index")->with('delete', 'Media Deleted Successfully');
    }
}
