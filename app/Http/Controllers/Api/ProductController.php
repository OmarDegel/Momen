<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Resources\ProductCollection;

class ProductController extends MainController
{
    public function show($id)
    {
        $relations = [
            'categories',
            'unit',
            'brand',
            'children.images',
            'reviews',
            'children',
            'children.size',
            'children.colors',
            'children.images',
            'favorites',
        ];
        $product = Product::with($relations)->filter()
            ->where('id', $id)
            ->first();
        if (!$product) {
            return $this->sendError(__('site.not_found_product'), 404);
        }
        return $this->sendData(new ProductResource($product));
    }
    public function index(ProductRequest $request)
    {
        $relations = [
            'categories',
            'unit',
            'colors',
            'size',
            'brand',
            'parent',
            'favorites',
            'images',
            'reviews',
        ];
        $products = Product::with($relations)->filter($request)->paginate($this->perPage);

        return $this->sendDataCollection(new ProductCollection($products));
    }
}
