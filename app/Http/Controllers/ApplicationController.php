<?php

namespace App\Http\Controllers;

use App\Applications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('applications.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'description.required' => 'Application description field is required !',
            'title.required' => 'Application title field is required !',
        ];
        $this->validate($request, [
            'description' => 'required',
            'title' => 'required',
        ],$messages);
        $app = new Applications();

        $app->user_id = auth()->id();
        $app->title = $request->title;
        $app->description = $request->description;
        $app->app_date = date("Y-m-d H:i:s");
        $app->save();
        $noti = array("message" => "Application Submitted Successfully!", "alert-type" => "success");
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
        $app=Applications::where('user_id',auth()->id())->get();
        return view('applications.show',compact('app'));
    }

    public function view($id)
    {
        $app=Applications::find($id);
        if(empty($app))
        {
            return view('errors.error404');
        }
        return view('applications.view',compact('app'));
    }

    public function viewall()
    {
        $app=Applications::all();
        if(empty($app))
        {
            return view('errors.error404');
        }
        return view('applications.viewall',compact('app'));
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
        $app=Applications::find($id);
        $app->delete();
        $noti = array("message" => "Application Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
