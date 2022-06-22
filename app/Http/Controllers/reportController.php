<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function show(){
        return view('dashboard.reports.index',[
            'title' => 'report',
            'order' => Order::all()
        ]);
    }
    public function create(){
        //
    }
}
