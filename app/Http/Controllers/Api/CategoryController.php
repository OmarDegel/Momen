<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Resources\CategoryCollection;

class CategoryController extends MainController
{
    public function index(CategoryRequest $request)
    {
        $categories = Category::filter($request)->with(['parent', 'children'])->paginate($this->perPage);
        return $this->sendDataCollection(new CategoryCollection($categories));
    }


    public function show(string $id)
    {
        $category = Category::with(['parent', 'children'])->filter()->where('id', $id)->first();
        if (!$category) {
            return $this->sendError(__('api.category_not_found'), 404);
        }
        return $this->sendData(new CategoryResource($category));
    }
}
