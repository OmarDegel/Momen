<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use App\Services\ProductImagesService;
use App\Http\Requests\Dashboard\ProductRequest;

class ProductController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    protected $productService, $productImagesService;
    public function __construct(ProductImagesService $ImageService, ProductService $ProductService)
    {
        parent::__construct();
        $this->setClass('products');
        $this->productImagesService = $ImageService;
        $this->productService = $ProductService;
    }
    public function index(Request $request)
    {
        $data = ['categories', 'size', 'brand', 'children', 'parent'];
        $products = Product::with($data)->filter($request, 'admin')->paginate($this->perPage);

        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        });
        $brands = Brand::active()->get()->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->nameLang()];
        })->toArray();
        $categories = Category::active()
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id =>  $category->nameLang()];
            })->toArray();
        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::active()->get();
        $sizes = Size::active()->get();

        $categories = Category::active()
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->nameLang()];
            });
        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        });
        return view('admin.products.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {

                $data = $request->except('images');

                $product = Product::create($data);
                $product->categories()->sync($request->categories);

                $this->productService->handleProductChildren($request, $product);

                $images = $this->productImagesService->uploadImage('products', $request, $product->id);

                if ($images && count($images) > 0) {
                    $product->update(['image' => $images[0]->image]);
                }
            });
        } catch (\Throwable $e) {
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput();
        }

        return redirect()->route('dashboard.products.index')
            ->with('success', __('site.added_successfully'));
    }



    public function show(string $id)
    {
        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        });
        $product = Product::with('children', 'colors','images','categories')->findOrFail($id);

        $brands = Brand::active()->get();
        $sizes = Size::active()->get();

        $categories = Category::active()
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->nameLang()];
            });

        return view('admin.products.edit', get_defined_vars());
    }
    public function edit(string $id)
    {
        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        });
        $product = Product::with('children', 'colors','images','categories')->findOrFail($id);

        $brands = Brand::active()->get();
        $sizes = Size::active()->get();

        $categories = Category::active()
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->nameLang()];
            });

        return view('admin.products.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        dd($request->all());
        $data = $request->except('images');
        try {
            DB::transaction(function () use ($product, $data, $request) {
                $product->update($data);

                $product->categories()->sync($request->categories);

                $product->deleteChildrenOldWhenNotSendInUpdate();

                $this->productService->handleProductChildren($request, $product);

                $images = $this->productImagesService->editImages($request, $product, 'products');
                if ($images && count($images) > 0) {
                    $product->update(['image' => $images[0]->image]);
                }
            });
        } catch (\Throwable $th) {
            return redirect()->back()
                ->with('error', __('site.something_went_wrong'))
                ->withInput();
        }

        return redirect()->route('dashboard.products.index')
            ->with('success', __('site.updated_successfully'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
