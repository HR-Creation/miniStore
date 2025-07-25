<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    private static $order;

    public static function saveInfo($request)
    {
        self::$order = new Order();
        self::$order->customer_id = $request->customer_id;
        self::$order->blog_id = $request->product_id;
        self::$order->quantity = $request->quantity;
        self::$order->current_phone = $request->phone;
        self::$order->current_address = $request->address;
        self::$order->save();
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function statusChange($id)
    {
        self::$order = Order::find($id);
        if (self::$order->status == 1)
        {
            self::$order->status = 2;
        }
        else if (self::$order->status == 2)
        {
            self::$order->status = 3;
        }
        else
        {
            self::$order->status = 4;
        }
        self::$order->save();
    }

}
