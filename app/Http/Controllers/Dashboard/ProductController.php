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
        $data = ['categories', 'sizes', 'brand', 'children', 'parent'];
        $products = Product::with($data)->filter($request, 'admin')
            ->where('parent_id', null)->paginate($this->perPage);

        $colors = Color::active()->select(
            'id',
            'name'
        )->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        });
        $brands = Brand::active()->select(
            'id',
            'name'
        )->get()->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->nameLang()];
        })->toArray();
        $categories = Category::where('active', 1)->select(
            'id',
            'name'
        )
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
        $product = null;
        $brands = Brand::active()->select('id', 'name')->get()->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->nameLang()];
        })->toArray();
        $sizes = Size::active()->select('id', 'name')->get()->mapWithKeys(function ($size) {
            return [$size->id => $size->nameLang()];
        })->toArray();

        $categories = Category::where('active', 1)
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->nameLang()];
            })->toArray();
        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        })->toArray();
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

                $images = $this->productImagesService->uploadImage('products', $request->file('images'), $product->id);

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
        return $this->edit($id);
    }
    public function edit(string $id)
    {

        $product = Product::with('children', 'images', 'categories', 'children.images', 'children.sizes')->findOrFail($id);

        $brands = Brand::active()->select('id', 'name')->get()->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->nameLang()];
        })->toArray();
        $sizes = Size::active()->select('id', 'name')->get()->mapWithKeys(function ($size) {
            return [$size->id => $size->nameLang()];
        })->toArray();

        $categories = Category::where('active', 1)
            ->with('parent')
            ->get()
            ->mapWithKeys(function ($category) {
                return [$category->id => $category->nameLang()];
            })->toArray();
        $colors = Color::active()->get()->mapWithKeys(function ($color) {
            return [$color->id => $color->nameLang()];
        })->toArray();

        return view('admin.products.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->except('images');
        try {
            DB::transaction(function () use ($product, $data, $request) {
                $product->update($data);

                $product->categories()->sync($request->categories);

                $product->deleteChildrenOldWhenNotSendInUpdate();

                $this->productService->handleProductChildren($request, $product);

                $images = $this->productImagesService->editImages($request->file('images'), $product, 'products');
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
