<?php

namespace App\Http\Controllers;

use App\Complains;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complains.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'complain_title' => 'required|max:50',
            'complain_description' => 'required|max:500',
        ]);
        $complain= new Complains();
        $complain->title = $request->complain_title;
        $complain->description = $request->complain_description;
        $complain->status= "Pending";
        $complain->user_id = "19";
        $complain->save();
        $noti = array("message" => "Complain Added Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data=Complains::all();
        return view('complains.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complain=Complains::find($id);
        return view('complains.Edit',compact('complain'));
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
        $this->validate($request, [
            'complain_title' => 'required|max:50',
            'complain_description' => 'required|max:500',
        ]);
        $complain= new Complains();
        $complain=Complains::find($id);
        $complain->title = $request->complain_title;
        $complain->description = $request->complain_description;
        $complain->status= $request->complain_status;
        $complain->user_id = "19";
        $complain->update();
        $noti = array("message" => "Complain Updated Successfully!", "alert-type" => "success");
        return redirect()->route('complains.show')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complain=Complains::find($id);
        $complain->delete();
        $noti = array("message" => "Complain Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
