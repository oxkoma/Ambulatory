<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Status;
use App\Models\Ambulatory;
use App\Models\Doctor;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserCabinetController extends Controller
{
    public function showUserData() {
        if(Auth::user()) {
             $user = User::find(Auth::user()->id);
        }
       
        return view('user.index', compact('user'));
    }
    
    public function editUserData() {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);
       }
        
        return view('user.edit', compact('user'));
    }

    public function updateUserData(Request $request) {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);
       }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone'=>'required',
        ]); 
        $user->update($request->all());

        return redirect()->route('user-data')->with('success', 'Дані оновлено');
    }

    public function showOrder() {
        $statuses = Status::all();
        $ambulatories = Ambulatory::all();
        $doctors = Doctor::all();
        
        if(Auth::user()) {
            $orders = Order::where('user_id', Auth::user()->id)->orderBy('date', 'desc')->get();
       }

        return view('user.orders.index', compact('orders', 'statuses', 'ambulatories', 'doctors'));
    }
}