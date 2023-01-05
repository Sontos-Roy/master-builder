<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\Designs;
use App\Models\flatDesign;
use Illuminate\Http\Request;

class flatDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['roomDesign'] = Designs::all();
        $this->data['flat_sec'] = flatDesign::all();
        return view("backend.home.flatDesign", $this->data);
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
            'description' => '',
            'total_area' => '',
            'total_floor' => '',
            'parking_lot' => '',
            'social_area' => ''
        ]);

        flatDesign::create($data);

        return redirect()->route('flat_sec.index')->with('success', "Data Created Successfully");
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
            'description' => '',
            'total_area' => '',
            'total_floor' => '',
            'parking_lot' => '',
            'social_area' => ''
        ]);

        flatDesign::find($id)->update($data);

        return redirect()->route('flat_sec.index')->with('success', "Data Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        flatDesign::find($id)->delete();

        return back()->with('delete', 'Data Deleted Successfully');
    }
}
