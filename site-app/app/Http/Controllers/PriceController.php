<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PriceDoctor;
use App\Models\PriceAnalise;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class PriceController extends Controller
{
    public function show() {
        $prices = PriceDoctor::all();
        return view('site.doctor-one', compact('prices'));
    }

    public function showAnalise() {
        $prices = PriceAnalise::paginate(25);
        return view('site.price', compact('prices'));
    }

    public function search(Request $request) {
        $s = $request->s;
        
        if (!empty($s)) {
        $prices = PriceAnalise::where('price_analises.research', 'LIKE', '%'.$s.'%')
                        ->orderBy('price_analises.research')
                        ->paginate(25);
        }
        else {
            $prices = PriceAnalise::orderBy('price_analises.research')->paginate(25);  
        } 

        return view('site.price', compact('prices'));
    }
}
