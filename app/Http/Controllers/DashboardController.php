<?php

namespace App\Http\Controllers;

use App\Http\Services\DataPreparer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {

        return view ('dashboard');
    }

}
