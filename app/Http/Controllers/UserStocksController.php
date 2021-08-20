<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class UserStocksController extends Controller
{
    public function index()
    {
        $stocks = Stock::all();

        return view('stocks',['stocks'=>$stocks]);
    }



}
