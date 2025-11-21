<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\ProductHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Service;
use App\Models\Size;
use App\Models\Unit;
use App\Services\ImageHandlerService;
use App\Services\ProductImagesService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;

class ProductController extends MainController
{
    protected $imageService;
    protected $productService;

    public function __construct(ProductImagesService $imageService, ProductService $productService)
    {
        parent::__construct();
        $this->setClass('products');
        $this->imageService = $imageService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $data = ProductHelper::getProductRelationsInIndexDashboard();
        $products = Product::with($data)->filter($request, 'admin')->paginate($this->perPage);

        // $units = Unit::listForSelect('filter');
        $brands = Brand::listForSelect('filter');
        $categories = Category::listForSelect('filter');

        $colors = Color::listForSelect('filter');
        $sizes = Size::listForSelect('filter');


        return view('admin.products.index', get_defined_vars());
    }

    public function create()
    {
        $brands = Brand::listForSelect('default');
        // $units = Unit::listForSelect('default');
        $sizes = Size::listForSelect('default');
        $categories = Category::listForSelect('default');
        $colors = Color::listForSelect('default');
        $product = null;

        return view('admin.products.create', get_defined_vars());
    }



    public function store(ProductRequest  $request)
    {
        try {
            DB::transaction(function () use ($request) {


                $product = Product::create($request->all());
                $this->imageService->uploadImage('products', $request->images, $product->id);

                $product->categories()->sync($request->categories);


                $this->productService->handleProductChildren($request, $product);
            });
        } catch (\Throwable $e) {
            if (isset($data['image'])) {
                $this->imageService->deleteImage($data['image']);
            }

            return redirect()->back()
                ->with('error', __('site.something_went_wrong'))
                ->withInput();
        }

        return redirect()->route('dashboard.products.index')->with('success', __('site.added_successfully'));
    }



    public function show(string $id)
    {
        $product = Product::with('children')->findOrFail($id);
        $brands = Brand::listForSelect('default');
        $units = Unit::listForSelect('default');
        $sizes = Size::listForSelect('default');
        $colors = Color::listForSelect('default');
        $categories = Category::listForSelect('default');


        return view('admin.products.edit', get_defined_vars());
    }

    public function edit(string $id)
    {
        $data = ProductHelper::getProductRelationsInShowDashboard();
        $product = Product::with($data)->find($id);

        $brands = Brand::listForSelect('default');
        // $units = Unit::listForSelect('default');
        $sizes = Size::listForSelect('default');
        $colors = Color::listForSelect('default');
        $categories = Category::listForSelect('default');
        return view('admin.products.edit', get_defined_vars());
    }


    public function update(ProductRequest $request, Product $product)
    {

        try {
            DB::transaction(function () use ($product, $request) {
                $product->update($request->all());
                $this->imageService->editImages($request->images, $product, 'products');
                if (isset($request->delete_ids)) {
                    $arr=implode(',', $request->delete_ids);
                    $this->imageService->deleteImages($arr);
                }
                $product->categories()->sync($request->categories);
                $this->productService->handleProductChildren($request, $product);
            });
        } catch (\Throwable $th) {
            if (isset($data['image'])) {
                $this->imageService->deleteImage($data['image']);
            }


            return redirect()->back()
                ->with('error', __('site.something_went_wrong'))
                ->withInput();
        }

        return redirect()->route('dashboard.products.index')->with('success', __('site.updated_successfully'));
    }




    public function destroy(string $id) {}
}
