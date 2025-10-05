<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\ImageHandlerService;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Controllers\Dashboard\MainController;

class CategoryController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    protected $imageService;
    public function __construct(ImageHandlerService $ImageHandlerService)
    {
        parent::__construct();
        $this->setClass('categories');
        $this->imageService = $ImageHandlerService;
    }
    public function index()
    {
        $categories = Category::with('parent')->filter(request())->paginate($this->perPage);
        $parentCategories = Category::where('parent_id', null)->get();
        return view('admin.categories.index', compact('categories', 'parentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = Category::get();
        return view('admin.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $imageUrl = $this->imageService->uploadImage('categories', $request, 800, 600, true);

        $data = $request->except('image');
        $data['image'] = $imageUrl['image'] ?? null;
        Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('success', __('site.category_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $parentCategories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $imageUrl = $this->imageService->editImage($request, $category, 'categories');
        $data = $request->except('image');
        $data['image'] = $imageUrl['image'] ?? $category->image;
        $category->update($data);
        return redirect()->route('dashboard.categories.index')->with('success', __('site.category_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', __('site.category_deleted_successfully'));
    }
    public function restore(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->back()->with('success', __('site.category_restored_successfully'));
    }
    public function forceDelete(string $id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $this->imageService->deleteImage($category->image);
        $category->forceDelete();
        return redirect()->back()->with('success', __('site.category_deleted_successfully'));
    }
}
