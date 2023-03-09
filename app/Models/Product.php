<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public static $image,$imageName,$imageDirectory,$product,$imagePath,$imageExtension;

    public static function getImageUrl($request){
        // self::$image = $request->file('image');
        $imageUrls = [];
        foreach ($request->file('image') as $image) {
            self::$imageExtension = $image->getClientOriginalExtension();
            self::$imageName = time().'.'.self::$imageExtension;
            self::$imageDirectory = 'product-image/';
            $image->move(self::$imageDirectory,self::$imageName);
            $imageUrl = self::$imageDirectory.self::$imageName;
            $imageUrls[] = $imageUrl;
        }
        return $imageUrls;
    }

    public static function createProduct($request)
    {

        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->brand_id    = $request->brand_id;
        self::$product->title       = $request->title;
        self::$product->description = $request->description;
        self::$product->image       = implode(",", self::getImageUrl($request));;
        self::$product->code        = $request->code;
        self::$product->price       = $request->price;
        self::$product->save();
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if($request->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);
            }

            $imageUrls = self::getImageUrl($request);

        }
        else{
            self::$imagePath = self::$product->image;
        }

        self::$product->category_id = $request->category_id;
        self::$product->brand_id    = $request->brand_id;
        self::$product->title       = $request->title;
        self::$product->description =$request->description;
        self::$product->image = implode(",", $imageUrls);
        self::$product->code        =$request->code;
        self::$product->price       = $request->price;
        self::$product->save();
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
