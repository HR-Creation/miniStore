<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;

    private static $customer;

    public static function saveInfo($request, $id=null)
    {
        if ($id!=null)
        {
            self::$customer = Customer::find($id);
        }
        else
        {
            self::$customer = new Customer();
        }        
        self::$customer->name = $request->name;
        self::$customer->email = $request->email;
        self::$customer->password = bcrypt($request->password);
        self::$customer->phone = $request->phone;
        self::$customer->address = $request->address;
        self::$customer->save();
    }

    public static function statusChange($id)
    {
        self::$customer = Customer::find($id);
        if (self::$customer->status == 1)
        {
            self::$customer->status = 0;
        }
        else
        {
            self::$customer->status = 1;
        }
        self::$customer->save();
    }

    public static function deleteInfo($id)
    {
        self::$customer = Customer::find($id);
        self::$customer->delete();
    }

}
