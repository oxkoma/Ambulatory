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
use Carbon\Carbon;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::paginate(5);
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
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            
        ]);
              
        
        Doctor::create($request->all());
        $doctor = DB::table('doctors')->orderBy('id', 'desc')->first();

        if($request->hasFile('img')) {
            $fileName = time().$request->img->getClientOriginalName();
            $path = $request->file('img')->storeAs('image', $fileName);  
        }
      
       DB::table('doctors')->where('id', '=', $doctor->id)->update(['img' => $fileName]);
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
        $doctor = Doctor::find($id);
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'mname' => 'required',
            'speciality_id' => 'required',
            'description'=>'required',
            'experience'=>'required',
            'category'=>'required',
            'img' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]); 
       
        if($request->hasFile('img')) {
            $fileName = time().$request->img->getClientOriginalName();
            $path = $request->file('img')->storeAs('image', $fileName);
            $doctor->img = $fileName;       
        }
        $doctor->update($request->all());
        
        if($request->hasFile('img')) {
            $fileName = time().$request->img->getClientOriginalName();
            $path = $request->file('img')->storeAs('image', $fileName);
            $doctor->img = $fileName;       
        }
        $doctor->save();
        
        return redirect()->route('doctors.show', $doctor->id)->with('success', 'Record updated');

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
       
        $todayDate = Carbon::now();
        $todayDate = Carbon::parse($todayDate);

        return 
            view('site.doctor-one', compact('doctor', 'specialities', 'shedules', 'ambulatories', 'prices', 'todayDate'));
    }

    public function showOnline() {
        return view('site.online');
    }


}