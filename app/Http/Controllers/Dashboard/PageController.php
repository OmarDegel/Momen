<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PageRequest;
use App\Models\Page;
use App\Services\ImageHandlerService;
use Illuminate\Http\Request;

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
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $imageUrl = $this->imageService->uploadImage('pages', $request, 800, 600);
        $request['image'] = $imageUrl['image'] ?? null;
        Page::create($request->all());
        return redirect()->route('dashboard.pages.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, string $id)
    {
        $page = Page::findOrFail($id);
        $imageUrl = $this->imageService->editImage($request, $page, 'pages');
        $request['image'] = $imageUrl['image'] ?? null;
        $page->update($request->all());
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
