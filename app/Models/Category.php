<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category;

    public static function saveInfo($request, $id=null)
    {
        if ($id!= null)
        {
            self::$category = Category::find($id);
        }
        else
        {
            self::$category = new Category();
        }
        self::$category->name = $request->name;
        self::$category->save();
    }

    public static  function deleteInfo($id)
    {
        self::$category = Category::find($id);
        self::$category->delete();
    }

    public static function statusChange($id)
    {
        self::$category = Category::find($id);
        if (self::$category->status == 1)
        {
            self::$category->status = 0;
        }
        else
        {
            self::$category->status = 1;
        }
        self::$category->save();
    }
}
