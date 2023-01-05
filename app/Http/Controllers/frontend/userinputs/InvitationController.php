<?php

namespace App\Http\Controllers\frontend\userinputs;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationController extends Controller
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
            $this->data['invites'] = Invitation::where('name', 'LIKE' , "%$search%")->orwhere('contact_no', 'LIKE' , "%$search%")->orwhere('land_size', 'LIKE' , "%$search%")->orderBy('id', 'desc')->paginate(10)->appends($request->all());
        }else{
            $this->data['invites'] = Invitation::orderBy('id', 'desc')->paginate(10);
        }
        $this->data['counts'] = Invitation::all();
        return view("backend.Invitations.index", $this->data);
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
            'name' => 'required | string',
            'contact_no' => 'required | numeric | regex:/(01)[0-9]{9}/ | min:11 ',
            'address' => 'required',
            'land_size' => 'required'
        ]);

        Invitation::create($data);

        // return redirect()->to('/message')->with('success','Thanks for your Intrest, We will contact with you soon');
        return response()->json(['status'=>true, 'msg'=> 'Thanks for your Interest. We Will contact with you soon. Just keep in touch. <br> <span class="text-primary">Thank you.</span>']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $this->data['data'] =  Invitation::find($id);
        // return view('backend.invitations.show', $this->data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invitation::find($id)->delete();
        return redirect()->route('invitation.index')->with('delete', "Invitation Deleted Successfully");
    }
    function del(Request $request){
        $count = 0;
        foreach($request->mark as $index => $mark){
            Invitation::find($mark)->delete();
            $count = $index + 1 ;
        }

        return back()->with("delete", 'Deleted '. $count. ' Items');
    }
}
