<?php

namespace App\Http\Controllers;

use App\Suggestions;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
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
        return view('suggestions.add');
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
            'suggestion_title' => 'required|max:50',
            'suggestion_description' => 'required|max:500',
        ]);
        $suggestion= new Suggestions();
        $suggestion->title = $request->suggestion_title;
        $suggestion->description = $request->suggestion_description;
        $suggestion->status= "Pending";
        $suggestion->user_id = auth()->id();
        $suggestion->save();
        $noti = array("message" => "Suggestion Added Successfully!", "alert-type" => "success");
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
        $data=Suggestions::all();
        return view('suggestions.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suggestion=Suggestions::find($id);
        return view('suggestions.Edit',compact('suggestion'));
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
            'suggestion_title' => 'required|max:50',
            'suggestion_description' => 'required|max:500',
        ]);
        $suggestion= new Suggestions();
        $suggestion=Suggestions::find($id);
        $suggestion->title = $request->suggestion_title;
        $suggestion->description = $request->suggestion_description;
        $suggestion->status= $request->suggestion_status;
        $suggestion->user_id = auth()->id();
        $suggestion->update();
        $noti = array("message" => "Suggestion Updated Successfully!", "alert-type" => "success");
        return redirect()->route('suggestions.show')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suggestion=Suggestions::find($id);
        $suggestion->delete();
        $noti = array("message" => "Suggestion Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
