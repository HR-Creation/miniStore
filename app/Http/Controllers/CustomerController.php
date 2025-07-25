<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', [
            'customers' => Customer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Customer::statusChange($id);
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('front-end.customer.edit', [
            'customer' => Customer::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Customer::saveInfo($request, $id);
        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::deleteInfo($id);
        return redirect(route('customers.index'));
    }

    private static $customer;

    public function customerSingUp()
    {
        return view('front-end.customer.singup');
    }

    public function customerLogin()
    {
        return view('front-end.customer.login');
    }

    public function saveCustomer(Request $request)
    {
        Customer::saveInfo($request);
        return redirect(route('customer.login'));
    }

    public function customerLoginCheck(Request $request)
    {
        self::$customer = Customer::where('email', $request->email)->first();

        if (self::$customer)
        {
            if (password_verify($request->password, self::$customer->password))
            {
                Session::put('customerId', self::$customer->id);
                Session::put('customerEmail', self::$customer->email);
                Session::put('customerName', self::$customer->name);

                return redirect(route('home'))->with('message', 'Welcome!');
            }
            else
            {
                return back()->with('message', 'Password is incorrect');
            }
        }
        else
        {
            return back()->with('message', 'Please use valid Email');
        }
    }

    public function logout()
    {
        Session::forget('customerId');
        Session::forget('customerEmail');
        Session::forget('customerName');
        return back();
    }

}
