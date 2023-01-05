<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\headerSide;
use Illuminate\Http\Request;

class headerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['header'] = headerSide::all();
        return view("backend.header.index", $this->data);
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
            'logo' => 'required | image',
            'phone' => 'required',
            'email' => 'email | required'
        ]);


        $create = headerSide::create($data);

        createImage($create, 'images/header', 'logo', $request, 'logo');

        // return redirect()->route('header.index')->with('success', 'Data Created Successfully');
        return response()->json(['status' => true, 'msg' => 'Header Created Successfully']);
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
            'logo' => 'Image',
            'phone' => 'required',
            'email' => 'required'
        ]);

        $fileName = updateImage('images/header', 'logo', $request, 'logo', $id);

        if($request->hasFile('logo')){
            $data['logo'] = $fileName;
        }

        headerSide::find($id)->update($data);

        // return redirect()->route('header.index')->with('success', 'Data Updated Successfully');
        return response()->json(['status' => true, 'msg' => 'Header Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = headerSide::find($id);

        deleteImage("header", $delete->id);

        $delete->delete();

        return back()->with("delete", "Data deleted Successfully");

    }
}
