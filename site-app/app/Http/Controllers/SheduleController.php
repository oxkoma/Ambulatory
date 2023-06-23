<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speciality;
use App\Models\Shedule;
use App\Models\Doctor;
use App\Models\Ambulatory;

use Carbon\Carbon;

class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shedules = Shedule::all();
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.index', compact('shedules', 'doctors', 'specialities', 'ambulatories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.create', compact( 'doctors', 'specialities', 'ambulatories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'speciality_id' => 'required',
            'doctor_id' => 'required',
            'ambulatory_id' => 'required',
            'date_start' => 'required|date_format:"m-d-Y"',
            'date_end' => 'required|date_format:"m-d-Y"',
            'time_start' => 'required|date_format:"H:i"',
            'time_end' => 'required|date_format:"H:i"',
            'time_interval' => 'required|integer',
        ]);
        Shedule::create($request->all());

        return redirect()->route('admin.shedules.index')->with('success', 'Record created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shedules = Shedule::find($id);
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.show', compact('shedules', 'doctors', 'specialities', 'ambulatories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shedules = Shedule::find($id);
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.edit', compact('shedules', 'doctors', 'specialities', 'ambulatories'));
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
        $request->validate([
            'speciality_id' => 'required',
            'doctor_id' => 'required',
            'ambulatory_id' => 'required',
            'date_start' => 'required|date_format:"m-d-Y"',
            'date_end' => 'required|date_format:"m-d-Y"',
            'time_start' => 'required|date_format:"H:i"',
            'time_end' => 'required|date_format:"H:i"',
            'time_interval' => 'required|integer',
        ]);
        $shedule = Shedule::find($id);
        $shedule->update($request->all());
        return redirect()->route('shedules.index')->with('success', 'Record updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shedule = Shedule::find($id);
        $shedule->delete();
        return redirect()->route('shedules.index')->with('success', 'Record deleted');

    }

    public function selectTime(Request $request) {
        if ($request->ajax()) {
        
            // foreach ($shedules as $shedule) {

            //     while($shedule->date_start <= $shedule->date_end) {
            //         for($j = $shedule->time_start; $j <= $shedule->time_end; $j = $time_interval) {
            //             $curr_date = timestamp($shedule->date_start, $j);
            //                DateTime::create([
            //                     'doctor_id' => $shedules_date->doctor_id,
            //                     'ambulatory_id' => $shedules_date->ambulatory_id,
            //                     'full_date_appoint' => $curr_date ,
            //                     'date_appoint' => $shedule->date_start ,
            //                     'time_appoint' => $j,
            //                 ]);
            //             $curr_date = date_add($curr_date, $j.' minutes');
            //             $j = date_parse_from_format('H:i', $curr_date);
            //         }
            //         $shedule->date_start = date_add($shedule->date_start , '1 days' );
            //     }
            // }  
            $times = DateTime::where('ambulatory_id', $request->ambulatory_id)->where('doctor_id', $request->doctor_id)->get()->pluck('date_appont', ,'time_appoint', 'id');

        }
        
            $data = view('site.template-parts.selecttime', compact('times'))->render();
            return response()->json(['options'=>$data]);
            
    }
     
}
    


    

