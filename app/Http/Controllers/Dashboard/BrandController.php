<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BrandRequest;
use App\Models\Brand;
use App\Services\ImageHandlerService;
use Illuminate\Http\Request;

class BrandController extends MainController
{
    protected $imageService;
    public function __construct(ImageHandlerService $imageService)
    {
        parent::__construct();
        $this->setClass('brands');
        $this->imageService = $imageService;
    }
    public function index()
    {
        $brands = Brand::filter(request())->paginate($this->perPage);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $imageUrl = $this->imageService->uploadImage('brands', $request, 800, 600);
        $data = $request->validated();
        $data['image'] = $imageUrl['image'] ?? null;

        Brand::create($data);
        return redirect()->route('dashboard.brands.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        $imageUrl = $this->imageService->editImage($request, $brand, 'brands');
        $data = $request->validated();
        $data['image'] = $imageUrl['image'] ?? $brand->image ?? null;
        $brand->update($data);
        return redirect()->route('dashboard.brands.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $brand->restore();
        return redirect()->back()->with('success', __('site.restored_successfully'));
    }
    public function forceDelete(string $id)
    {
        $brand = Brand::withTrashed()->findOrFail($id);
        $this->imageService->deleteImage($brand->image);
        $brand->forceDelete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
}
