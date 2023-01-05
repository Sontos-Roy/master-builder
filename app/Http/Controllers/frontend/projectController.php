<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class projectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['projects'] = Projects::all();

        return view('backend.projects.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.projects.create');
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
            'project_name' => 'required',
            'address' => 'required',
            'description' => '',
            'status'=> 'required',
            'map' => '',
            'date' => 'date',
            'Image' => 'required | image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $create = Projects::create($data);
        createImage($create, 'images/project', 'Image', $request, "project_");

        // return redirect()->route('project.index')->with('success', 'Data Created Successfully');
        return response()->json(['status'=>true, 'msg'=> 'Project Created Successful', 'url'=>route("project.index")]);
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
        $this->data['project'] = Projects::find($id);

        return view('backend.projects.edit', $this->data);
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
            'project_name' => 'required',
            'address' => 'required',
            'description' => '',
            'status' => '',
            'map' => '',
            'date' => '',
            'Image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $image = updateImage('images/project', 'Image', $request, 'project_', $id);
        if($request->hasFile('Image')){
            $data['Image'] = $image;
        }

        Projects::find($id)->update($data);
        return redirect()->route('project.index')->with('success', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Projects::findOrFail($id);

        deleteImage('images/project', $project->Image);

        $project->delete();

        return back()->with('success', "Project Deleted Successfully");
    }
}
