<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeCollection;
use App\Http\Controllers\Api\MainController;

class HomeController extends MainController
{
    public function index()
    {
        $data = ['categories', 'unit', 'size', 'brand'];
        $products = Product::with($data)->filter()->paginate($this->perPage);

        $data = new HomeCollection($products);

        return $this->sendData($data);
    }
}
