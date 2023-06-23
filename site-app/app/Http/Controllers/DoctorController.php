<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Speciality;
use App\Models\Shedule;
use App\Models\Ambulatory;
use App\Models\PriceDoctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Models\DateTime;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $specialities = Speciality::all();

        return view('admin.doctor.index', compact('doctors', 'specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialities = Speciality::all();
        return view('admin.doctor.create', compact('specialities'));
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
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'speciality_id' => 'required',
            'description'=>'required',
            'experience'=>'required',
            'category'=>'required',
        ]);
        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success', 'Record created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        return view('admin.doctor.show', compact('doctor', 'specialities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        return view('admin.doctor.edit', compact('doctor', 'specialities'));
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
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'speciality_id' => 'required',
            'description'=>'required',
            'experience'=>'required',
            'category'=>'required',
        ]);
        $doctor = Doctor::find($id);
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Record updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Record deleted');

    }

    public function search(Request $request) {
        $s = $request->s;
        $specialities = Speciality:: all();
        $shedules = Shedule::all();
        $ambulatories = Ambulatory::all();
 
        if (!empty($s)) {

        $doctors = DB::table('doctors')->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                                        ->select('doctors.*', 'specialities.name')
                                        ->where('specialities.name', 'LIKE', '%'.$s.'%')
                                        ->orWhere('doctors.fname', 'LIKE', '%'.$s.'%')
                                        ->orderBy('doctors.fname')->paginate(5);
    }
        else {
            $doctors = DB::table('doctors')->join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                                            ->select('doctors.*', 'specialities.name')
                                            ->orderBy('doctors.fname')
                                            ->paginate(5);
        }
        
    
        return view('site.doctors', compact('doctors', 'specialities', 'shedules', 'ambulatories'));
    }
    public function searchSpeciality() {
        $specialities = Speciality:: all();
    
        return view('site.specialities', compact('specialities'));
    }

    public function showAll() {
        $doctors = Doctor::orderBy('fname')->paginate(5);
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        $shedules = Shedule::all();

        return 
            view('site.doctors', compact('doctors', 'specialities', 'shedules', 'ambulatories'));
    }
    
    public function showOne($id) {
        $doctor = Doctor::find($id);
        $specialities = Speciality::all();
        $ambulatories = Ambulatory::all();
        $prices = PriceDoctor::all();
        $shedules = Shedule::all();

        return 
            view('site.doctor-one', compact('doctor', 'specialities', 'shedules', 'ambulatories', 'prices'));
    }

    public function showOnline() {
        return view('site.online');
    }


}
