<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\progressCounter;
use Illuminate\Http\Request;

class progressCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['progresses'] = progressCounter::all();
        return view('backend.home.progress', $this->data);
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
            'progress_title' => 'required',
            'no_of_progress' => 'required | numeric',
            'progress_icon' => 'required | image'
        ]);
        $create = progressCounter::create($data);

        if($request->hasFile('progress_icon')){
            $originName =$request->file('progress_icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extention = $request->file('progress_icon')->getClientOriginalExtension();
            $fileName ='progress_'.$create->id.'.'.$extention;

            $request->file('progress_icon')->move(public_path('images/progress/'), $fileName);
            // $data['progress_icon'] = $fileName;
            $create->progress_icon = $fileName;

            $create->save();
        }

        return response()->json(['status'=> true, 'msg' => 'Data Created Successfully']);
        // return back()->with('success', 'Data Created Succesfully');
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
            'progress_title' => 'required',
            'no_of_progress' => 'required | numeric',
            'progress_icon' => 'image'
        ]);

        if($request->hasFile('progress_icon')){
            $image_path = "images/progress/".$request->progress_icon;

            if(file_exists($image_path)){
                unlink($image_path);
            }
            $originName = $request->file('progress_icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extention = $request->file('progress_icon')->getClientOriginalExtension();
            $fileName = 'progress_'.$request->id.'.'.$extention;

            $request->file('progress_icon')->move(public_path('images/progress/'), $fileName);
            $data['progress_icon'] = $fileName;
        }

        progressCounter::find($id)->update($data);

        return response()->json(['status'=> true, 'msg' => 'Updated Successfully']);
        // return back()->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $delete= progressCounter::find($id);
    //     $delete->delete();
    //     return back()->with('success', 'Deleted Successfully');
    // }
    public function destroy($id)
    {
        $delete = progressCounter::find($id);
        $image_path = "images/progress/progress_".$id.".png";
        if(file_exists($image_path)){
            unlink($image_path);
        }

        $delete->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
