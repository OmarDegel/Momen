<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageHandlerService;
use App\Http\Requests\Dashboard\PageRequest;

class PageController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    protected $imageService;
    public function __construct(ImageHandlerService $ImageHandlerService)
    {
        parent::__construct();
        $this->setClass('pages');
        $this->imageService = $ImageHandlerService;
    }
    public function index()
    {
        $pages = Page::filter(request())->paginate($this->perPage);
        $products = Product::where('parent_id', null)->select('id', 'name')->get()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();
        return view('admin.pages.index', compact('pages', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where('parent_id', null)->select('id', 'name')->get()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();
        return view('admin.pages.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $data = $request->except('image');
        $imageUrl = $this->imageService->uploadImage('pages', $request, 800, 600);
        $data['image'] = $imageUrl['image'] ?? null;

        Page::create($data);
        
        return redirect()->route('dashboard.pages.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        $products = Product::where('parent_id', null)->select('id', 'name')->get()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();

        return view('admin.pages.edit', compact('page', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        $products = Product::where('parent_id', null)->select('id', 'name')->get()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();

        return view('admin.pages.edit', compact('page', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        $page = Page::findOrFail($id);
        $data=$request->except('image');
        $imageUrl = $this->imageService->editImage($request, $page, 'pages');
        $data['image'] = $imageUrl['image'] ?? $page->image;
        $page->update($data);
        return redirect()->route('dashboard.pages.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $page = Page::withTrashed()->findOrFail($id);
        $page->restore();
        return redirect()->back()->with('success', __('site.restored_successfully'));
    }
    public function forceDelete(string $id)
    {
        $page = Page::withTrashed()->findOrFail($id);
        $page->forceDelete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
}
