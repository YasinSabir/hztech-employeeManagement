<?php

namespace App\Http\Controllers;

use App\Complains;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'complain_title' => 'required|max:50',
            'complain_description' => 'required|max:500',
        ]);
        $complain = new Complains();
        $complain->title = $request->complain_title;
        $complain->description = $request->complain_description;
        $complain->status = "Pending";
        $complain->user_id = auth()->id();
        $complain->save();
        $noti = array("message" => "Complain Added Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Complains::where('user_id', auth()->id())->get();
        if (empty($data)) {
            return view('errors.error404');
        }
        return view('complains.show', compact('data'));
    }

    public function viewall()
    {
        $data = Complains::all();
        if (empty($data)) {
            return view('errors.error404');
        }
        return view('complains.viewall', compact('data'));
    }

    public function view($id)
    {
        try{
            $app = Complains::find(decrypt($id));
            if (empty($app)) {
                return view('complains.view', compact('app'));
            }
        }catch (\Exception $e){

        }
        return view('errors.error404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $complain = Complains::find(decrypt($id));
            if (!empty($complain)) {
                return view('complains.Edit', compact('complain'));
            }
        }
        catch (\Exception $e){

        }
        return view('errors.error404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'complain_title' => 'required|max:50',
            'complain_description' => 'required|max:500',
        ]);
        $complain = new Complains();
        $complain = Complains::find($id);
        $complain->title = $request->complain_title;
        $complain->description = $request->complain_description;
        $complain->status = $request->complain_status;
        $complain->user_id = auth()->id();
        $complain->update();
        $noti = array("message" => "Complain Updated Successfully!", "alert-type" => "success");
        return redirect()->route('complains.show')->with($noti);
    }

    public function editall($id)
    {
        try {
            $complain = Complains::find(decrypt($id));
            if (!empty($complain)) {
                return view('complains.Editall', compact('complain'));
            }

        } catch (\Exception $e) {

        }
        return view('errors.error404');
    }

    public function updateall(Request $request, $id)
    {
        $this->validate($request, [
            'complain_title' => 'required|max:50',
            'complain_description' => 'required|max:500',
        ]);
        $complain = new Complains();
        $complain = Complains::find($id);
        $complain->title = $request->complain_title;
        $complain->description = $request->complain_description;
        $complain->status = $request->complain_status;
        $complain->user_id = auth()->id();
        $complain->update();
        $noti = array("message" => "Complain Updated Successfully!", "alert-type" => "success");
        return redirect()->route('complains.viewall')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complain = Complains::find($id);
        $complain->delete();
        $noti = array("message" => "Complain Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    public function destroyall($id)
    {
        $complain = Complains::find($id);
        $complain->delete();
        $noti = array("message" => "Complain Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
