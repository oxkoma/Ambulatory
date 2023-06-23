<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ambulatory;

class AmbulatoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambulatories = Ambulatory::all();
        
        return view('admin.ambulatory.index', compact('ambulatories', 'specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ambulatory.create', compact('specialities'));
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
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required|tel',
            'mobile_phone' => 'required|tel',
        ]);
        Ambulatory::create($request->all());

        return redirect()->route('ambulatories.index')->with('success', 'Record created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ambulatory = Ambulatory::find($id);
       
        return view('admin.ambulatory.show', compact('ambulatory', 'specialities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ambulatory = Ambulatory::find($id);
        
        return view('admin.ambulatory.edit', compact('ambulatory', 'specialities'));
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
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'mobile_phone' => 'required',
        ]);
        $ambulatory = Ambulatory::find($id);
        $ambulatory->update($request->all());
        return redirect()->route('ambulatories.index')->with('success', 'Record updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambulatory = Ambulatory::find($id);
        $ambulatory->delete();
        return redirect()->route('ambulatories.index')->with('success', 'Record deleted');

    }

}
