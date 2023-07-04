<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Ambulatory;
use App\Models\Doctor;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('status_id', 'asc')->paginate(10);
        $ordersCount = Order::where('status_id', '=', 1)->count();
        
        return view('admin.order.index', compact('orders', 'ordersCount'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses = Status::all();
        $ambulatories = Ambulatory::all();
        $doctors = Doctor::all();
        $order = Order::find($id);
       
        return view('admin.order.edit', compact('order', 'statuses', 'ambulatories', 'doctors'));
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
        $order = Order::find($id);
        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Запис оновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'ambulatory_id' => 'required',
            'fname' => 'required',
            'phone' => 'required',
        ]);
        
        Order::create($request->all());
        return redirect()->back()->with('success', 'Ваш запис відправлено на обробку. Очикуйте дзвінка нашого оператора');
    }

    // public function orderCount() {
    //     $ordersCount = Order::where('status_id', '=', 1)->count();
    
    //     return view('layouts.admin-dash-layout', compact('ordersCount'));
       
    // }
}