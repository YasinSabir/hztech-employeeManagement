<?php

namespace App\Http\Controllers;

use App\Holiday;
use DateTime;
use http\Env\Url;
//use http\Url;
use Illuminate\Http\Request;

class HolidayController extends Controller
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
        return view('holidays.add');
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
            'holiday_title' => 'required|max:255',
            'holiday_date' => 'required|unique:holiday,date',
        ]);
        //custom_varDump_die($request->all());
        $holiday = new Holiday();
        $holiday->title = $request->holiday_title;
        $holiday->date = $request->holiday_date;
        $holiday->save();
        $noti = array("message" => "Holiday Added Successfully!", "alert-type" => "success");
        return redirect()->route('holidays.show')->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Holiday::select('id', 'title', 'date', 'created_at')->get();
        if (empty($data)) {
            return view('errors.error404');
        }
        return view('holidays.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $decrypted = decrypt($id);
            $holiday = Holiday::find($decrypted);
            if (!empty($holiday)) {
                return view('holidays.Edit', compact('holiday'));
            }
        } catch (\Exception $e) {
            //return view('errors.error404');
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
        $message = [
            'holiday_date.before_or_equal' => 'holiday date must be valid.'
        ];
        $this->validate($request, [
            'holiday_title' => 'required|max:255',
            'holiday_date' => 'required|unique:holiday,date',
        ]);
        $holiday = new Holiday();
        $holiday = Holiday::find($id);
        $holiday->title = $request->holiday_title;
        $holiday->date = $request->holiday_date;
        $holiday->update();
        $noti = array("message" => "Holiday Updated Successfully!", "alert-type" => "success");
        return redirect()->route('holidays.show')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holiday::find($id);
        $holiday->delete();
        $noti = array("message" => "Holiday Deleted Successfully!", "alert-type" => "success");
        return redirect()->back()->with($noti);
    }
}
