<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function show()
    {
        $stocks = Stock::all();
        return view('market',['stocks'=>$stocks]);
    }
}
