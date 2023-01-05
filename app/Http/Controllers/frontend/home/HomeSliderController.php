<?php

namespace App\Http\Controllers\frontend\home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['Sliders'] = HomeSlider::orderBy('created_at', 'desc')->get();
        return view('backend.home.home_slider.all', $this->data);
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

        $data= $request->validate([
            'cover_title' => 'required',
            'cover_des' => '',
            'cover_des2' => '',
            'icon_img' => 'image|mimes:png,gif,svg|max:2024',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $create = HomeSlider::create($data);
        if($request->hasFile('icon_img')) {
            $originName = $request->file('icon_img')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon_img')->getClientOriginalExtension();
            $fileName ='icon_'.$create->id.'.'.$extension;

            $request->file('icon_img')->move(public_path('images/slider/'), $fileName);

            $create->icon_img = $fileName;
            $create->save();
        }
        if($request->hasFile('background_image')) {
            $originName = $request->file('background_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('background_image')->getClientOriginalExtension();
            $fileName ='bg_'.$create->id.'.'.$extension;

            $request->file('background_image')->move(public_path('images/slider/'), $fileName);

            $create->background_image = $fileName;
            $create->save();
        }

        return response()->json(['status' => true, 'msg' => 'Slider Creaded Successfully']);
        // return redirect()->route('home_slider.index')->with('success', 'Data Created Successfully');
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
        $this->data['slider'] = HomeSlider::find($id);

        return view('backend.home.home_slider.update', $this->data);
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
        $data= $request->validate([
            'cover_title' => '',
            'cover_des' => '',
            'cover_des2' => '',
            'icon_img' => 'image|mimes:png,gif,svg|max:2024',
            'background_image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        // dd($data);
        if($request->hasFile('icon_img')) {
            $image_path = "images/slider/".$request->icon_img;


            if (file_exists($image_path)) {

                unlink($image_path);

            }
            $originName = $request->file('icon_img')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon_img')->getClientOriginalExtension();
            $fileName ='icon_'.$request->id.'.'.$extension;

            $request->file('icon_img')->move(public_path('images/slider/'), $fileName);

            $data['icon_img'] = $fileName;
        }
        if($request->hasFile('background_image')) {
            // deleteImage('images/cover/', $request->background_image);
            $image_path2 = "images/slider/".$request->background_image;
            if (file_exists($image_path2)) {

                unlink($image_path2);

            }
            $originName = $request->file('background_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('background_image')->getClientOriginalExtension();
            $fileName ="bg_".$request->id.'.'.$extension;

            $request->file('background_image')->move(public_path('images/slider/'), $fileName);
            $data['background_image'] = $fileName;


        }

        HomeSlider::find($id)->update($data);

        // return response()->json(['status'=>true, 'msg'=> 'Slider Updated Successful', 'url'=>route("home_slider.index")]);
        return redirect()->route('home_slider.index')->with('success', 'Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = HomeSlider::find($id);
        deleteImage('slider', $delete->background_image);
        $delete->delete();
        return back()->with('delete',"Deleted Successfully");
    }
}
