<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function showSingleProduct($id){
        $relations=[
            'categories',
            'unit',
            'brand',
            'size',
            'color',
            'parent',
            'images',
            'reviews',
            'children',
        ];
        $product=Product::with($relations)->filter()->find($id);
    }
}
