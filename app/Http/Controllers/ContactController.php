<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
            $this->data['contacts'] = Contact::where('name', 'LIKE' , "%$search%")->orwhere('email', 'LIKE' , "%$search%")->orwhere('phone', 'LIKE' , "%$search%")->orwhere('message', 'LIKE' , "%$search%")->orderBy('id', 'desc')->paginate(10)->appends($request->all());
        }else{
            $this->data['contacts'] = Contact::orderBy('id', 'desc')->paginate(10);
        }
        $this->data['counts'] = Contact::all();
        return view("backend.contact.index", $this->data);
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
            'phone' => 'required | numeric | regex:/(01)[0-9]{9}/ | min:11 ',
            'email' => 'required | email',
            'message' => 'required'
        ]);
        Contact::create($data);
        // return redirect()->to('/message')->with('success','Thanks for Contact with us, We will contact with you soon');
        return response()->json(['status'=>true, 'msg'=> 'Thanks for Contact with us, We will contact with you soon']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['contact'] = Contact::find($id);
        return view("backend.contact.show", $this->data);
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
        Contact::find($id)->delete();

        return redirect()->route("contact.index")->with("delete","Contact Data Deleted Successfully");
    }
    function multidelete(Request $request){
        $count = 0;
        foreach($request->mark as $key => $mark){
            Contact::find($mark)->delete();
            $count =  $key + 1;
        }
        return back()->with('delete', 'Deleted '. $count . ' Items');
    }
}
