<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    private static $product, $image, $imgNewName, $imgDir, $imgUrl;

    public static function saveInfo($request, $id=null)
    {
        if ($id != null)
        {
            self::$product = Blog::find($id);
        }
        else
        {
            self::$product = new Blog();
        }
        self::$product->title = $request->title;
        self::$product->category_id = $request->category_id;
        self::$product->price = $request->price;
        self::$product->description = $request->description;
        if ($request->file('image'))
        {
            if (self::$product->image)
            {
                if (file_exists(self::$product->image))
                {
                    unlink(self::$product->image);
                }
            }
            self::$product->image = self::saveImage($request);
        }
        self::$product->save();
    }

    private static function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imgNewName = $request->title.'-'.rand().'.'.self::$image->extension();
        self::$imgDir = 'admin-assets/blog-images/';
        self::$imgUrl = self::$imgDir.self::$imgNewName;
        self::$image->move(self::$imgDir, self::$imgNewName);
        return self::$imgUrl;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function statusChange($id)
    {
        self::$product = Blog::find($id);
        if (self::$product->status == 1)
        {
            self::$product->status = 0;
        }
        else
        {
            self::$product->status = 1;
        }
        self::$product->save();
    }

    public static function deleteInfo($id)
    {
        self::$product = Blog::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }
}
