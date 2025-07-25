<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Blog;
use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index', [
            'orders' => Order::all()->sortBy('status')
        ]);
    }

    public function delivered()
    {
        return view('admin.order.index', [
            'orders' => Order::where('status', 4)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create(Request $request)
    {
        return view('front-end.order.create', [
            'product' => Blog::find($request->product_id),            
            'quantity' => $request->quantity,
            'customers' => Customer::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::saveInfo($request);
        return redirect(route('customer.orderlist', ['id'=>$request->customer_id]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Order::statusChange($id);
        return redirect(route('orders.index'));
    }

    public function view(string $id)
    {       
        return view('front-end.customer.orderlist', [
            'orders' => Order::where('customer_id', $id)->get()->sortByDesc('created_at')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
