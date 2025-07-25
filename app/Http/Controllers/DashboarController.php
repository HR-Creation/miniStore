<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboarController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
