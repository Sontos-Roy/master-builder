<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\Designs;
use Illuminate\Http\Request;

class DesignsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return route('flat_sec.index');
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
        // dd($request->all());
        $data = $request->validate([
            'room_name' => 'required',
            'room_size' => 'required',
            'room_design' => 'required|image'
        ]);

        $create = Designs::create($data);

        createImage($create, 'images/rooms', 'room_design', $request, 'room_');

        return redirect()->route("flat_sec.index")->with('success', 'Design Created Successfully');
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
            'room_name' => 'required',
            'room_size' => 'required',
            'room_design' => 'required|image'
        ]);

        $fileName = updateImage('images/rooms', 'room_design', $request, 'room_', $id);
        if($request->hasFile('room_design')){
            $data['room_design'] = $fileName;
        }

        Designs::find($id)->update($data);

        return redirect()->route("flat_sec.index")->with('success', 'Design Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Designs::find($id);

        deleteImage('rooms', $delete->id);

        $delete->delete();

        return back()->with('delete', 'Data Deleted Successfully');
    }
}
