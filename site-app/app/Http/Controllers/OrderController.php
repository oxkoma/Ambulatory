<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Status;
use App\Models\Ambulatory;
use App\Models\Doctor;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
use App\Mail\ConfirmMail;
use App\Mail\RejectOrder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $statuses = Status::all();
        $orders = Order::orderBy('status_id', 'asc')->orderBy('date', 'desc')->paginate(10);
        $ordersCount = Order::where('status_id', '=', 1)->count();
        
        return view('admin.order.index', compact('orders', 'ordersCount', 'statuses'));
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
    public function show()
    {
        
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
        $status = $request['status_id'];
        $order->update($request->all());
        
        if(isset($status) && $status == 2) {
            Mail::to($order->email)->send(new ConfirmMail($order));
        }
        if(isset($status) && $status == 3){
            Mail::to($order->email)->send(new RejectOrder($order));
        }
        
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
        $order = Order::findorFail($id);
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Запис видалено');
    }

    public function save(Request $request) {
        $request->validate([
            'date' => 'required|date',
            'ambulatory_id' => 'required',
            'fname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
    
        Order::create($request->all());
        Mail::to($request['email'])->send(new OrderCreated($request));

        return redirect()->back()->with('success', 'Ваш запис відправлено на обробку. Очикуйте дзвінка нашого оператора');
    }

    public function sortStatus(Request $request) {
        $status_id = $request['status'];
        $statuses = Status::all();
        if($status_id == 0) {
            return redirect()->route('orders.index');
        } else {
                   
            $orders = Order::orderBy('date', 'desc')->where('status_id', $status_id)->paginate(5);
        }
        return view('admin.order.index', compact('orders', 'statuses', 'status_id'));
    }
    
}