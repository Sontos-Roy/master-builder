<?php

namespace App\Http\Controllers\frontend\about;

use App\Http\Controllers\Controller;
use App\Models\CoreValues;
use Illuminate\Http\Request;

class CoreValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['corevalues'] = CoreValues::all();
        return view("backend.about.corevalues.index", $this->data);
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
        $create = $request->validate([
            'value'=> 'required',
            'value_des' => 'required',
            'icon' => 'image | required'
        ]);
        $data = CoreValues::create($create);
        createImage($data, "images/corevalues", 'icon', $request, 'value_');
        // return redirect()->route("corevalues.index")->with("success", "Core Values Created Successfully");
        return response()->json(['status' => true, 'msg' => 'Core Values created Successfully']);
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
            'value' => 'required',
            'value_des' => 'required',
            'icon' => 'image'
        ]);
        $filename = updateImage('images/corevalues', 'icon', $request, 'value_', $id);

        if($request->hasFile('icon')){
            $data['icon'] = $filename;
        }

        CoreValues::find($id)->update($data);
        // return redirect()->route("corevalues.index")->with("success", "Core Values Updated Successfully");
        return response()->json(['status' => true, 'msg' => 'Core Values Updated Successfully', 'url' => route('corevalues.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CoreValues::find($id);
        deleteImage("covervalues", $delete->icon);
        $delete->delete();
        return redirect()->route("corevalues.index")->with("delete", "Core Values Deleted Successfully");
    }
}
