<?php

namespace App\Http\Controllers;

use App\Roles;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoleController extends Controller
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
        //
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
            'role_description' => 'required|max:255',
            'role_title' => 'required|unique:Roles,title',
        ]);
        Roles::create([
            'title' => $request->role_title,
            'description' => $request->role_description,
            'status' => $request->role_status
        ]);
        $noti = array("message" => "Role Created Successfully!", "alert-type" => "success");
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
        $roles = Roles::all();
        if(empty($roles))
        {
            return view('errors.error404');
        }
        return view('roles.show', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);
        if(empty($role))
        {
            return view('errors.error404');
        }
        return view('roles.Edit', compact('role'));
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
            'role_description' => 'required|max:255',
            'role_title' => 'required|unique:Roles,title',
        ]);
        $role = new Roles();
        $role = Roles::find($id);
        $role->title = $request->role_title;
        $role->description = $request->role_description;
        $role->status = $request->role_status;
        $role->update();
        $noti = array("message" => "Role Updated Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::find($id);
        $role->delete();
        $noti = array("message" => "Role Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
