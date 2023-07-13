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
        $shedules = Shedule::paginate(10);
        $doctors = Doctor::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.index', compact('shedules', 'doctors', 'ambulatories'));
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
            'doctor_id' => 'required',
            'ambulatory_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'time_interval' => 'required|integer',
        ]);
        Shedule::create($request->all());

        return redirect()->route('shedules.index')->with('success', 'Запис створено');

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
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.show', compact('shedules', 'doctors', 'ambulatories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
       
        $shedule = Shedule::find($id);
        
        $time_start = Carbon::parse($shedule['time_start']);
        $timeStart = $time_start->format('H:i');
        $time_end = Carbon::parse($shedule['time_end']);
        $timeEnd = $time_end->format('H:i');
  
        $doctors = Doctor::all();
        $ambulatories = Ambulatory::all();
        return view('admin.shedule.edit', compact('shedule', 'doctors', 'ambulatories', 'timeStart', 'timeEnd'));
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
            'doctor_id' => 'required',
            'ambulatory_id' => 'required',
            'date_start' => 'required',
            'date_end' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'time_interval' => 'required|integer',
        ]);
        $shedule = Shedule::find($id);
        $shedule->update($request->all());
        return redirect()->route('shedules.index')->with('success', 'Запис оновлено');

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
        return redirect()->route('shedules.index')->with('success', 'Запис видалено');

    }

    public function sortAmbulatories(Request $request) {
        $ambulatory_id = $request['ambulatory'];
        // var_dump($request['ambulatory']);
        // die();
        $ambulatories = Ambulatory::all();
        if($request['ambulatory'] == 0) {
            return redirect()->route('shedules.index');
        } else {
            
            $shedules = Shedule::orderBy('ambulatory_id', 'asc')->where('ambulatory_id', $ambulatory_id)->paginate(10);
        }
        return view('admin.shedule.index', compact('shedules', 'ambulatories', 'ambulatory_id'));
    }
   
     
}
    


    