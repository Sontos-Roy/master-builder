<?php

namespace App\Http\Controllers\frontend\about;

use App\Http\Controllers\Controller;
use App\Models\Management;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['team'] = Management::all();
        return view("backend.about.management.index", $this->data);
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
            'name'=>'required',
            'designation' => 'required',
            'facebook' => '',
            'linkedin' => '',
            'email' => 'email',
            'image' => 'image',
        ]);
        $create = Management::create($data);
        createImage($create, 'images/management', 'image', $request, 'team_');

        // return redirect()->route("management.index")->with("success", 'Member Added Successfull');
        return response()->json(['status' => true, 'msg' => 'Member Added Successfully']);

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
            'name'=>'required',
            'designation' => 'required',
            'facebook' => '',
            'linkedin' => '',
            'email' => 'email',
            'image' => 'image',
        ]);
        $fileName = updateImage('images/management', 'image', $request, 'team_', $id);

        if($request->hasFile('image')){
            $data['image'] = $fileName;
        }
        Management::find($id)->update($data);

        // return redirect()->route("management.index")->with("success", 'Member Updated Successful');
        return response()->json(['status' => true, 'msg' => 'Member Updated Successfully', 'url' => route('management.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Management::find($id);
        deleteImage("management", $delete->image);

        $delete->delete();

        return redirect()->route("management.index")->with("delete", "Member Deleted Successfully");
    }
}
