<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\footerBar;
use Illuminate\Http\Request;

class footerBarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->data['footerMain'] = Footer::all();
        $this->data['footer'] = footerBar::all();
        return view("backend.footer.address", $this->data);
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
            'co_office' => 'required_without_all:re_office, office_time',
            're_office' => 'required_without_all:office_time, co_office',
            'office_time' => 'required_without_all:re_office, co_office'
        ]);

        footerBar::create($data);

        return response()->json(['status' => true, 'msg' => 'Data Created Successfully']);
        // return redirect()->route('footer.index')->with("success", "Data Created Successfully");
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
        $data = $request->all();

        footerBar::find($id)->update($data);

        return response()->json(['status' => true, 'msg' => 'Data Created Successfully']);
        // return redirect()->route('footer.index')->with("success", 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        footerBar::find($id)->delete();

        return redirect()->route("footer.index")->with("delete", "Data Deleted Successfully");
    }
}
