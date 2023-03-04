<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $image,$imageName,$imageDirectory,$product,$imagePath,$imageExtension;

    public static function getImageUrl($request){
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$imageDirectory = 'product-image/';
        self::$image->move(self::$imageDirectory,self::$imageName);

        return self::$imageDirectory.self::$imageName;
    }

    public static function createProduct($request)
    {

        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->brand_id    = $request->brand_id;
        self::$product->title       = $request->title;
        self::$product->description = $request->description;
        self::$product->image       = self::getImageUrl($request);
        self::$product->code        = $request->code;
        self::$product->price       = $request->price;
        self::$product->save();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
