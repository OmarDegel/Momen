<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SizeRequest;

class SizeController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        parent::__construct();
        $this->setClass('sizes');
    }
    public function index()
    {
        $sizes = Size::filter(request())->paginate($this->perPage);
        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SizeRequest $request)
    {
        Size::create($request->all());
        return redirect()->route('dashboard.sizes.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $size = Size::findOrFail($id);
        return view('admin.sizes.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $size = Size::findOrFail($id);
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SizeRequest $request, string $id)
    {
        $size = Size::findOrFail($id);
        $size->update($request->all());
        return redirect()->route('dashboard.sizes.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $size = Size::withTrashed()->findOrFail($id);
        $size->restore();
        return redirect()->back()->with('success', __('site.restored_successfully'));
    }
    public function forceDelete(string $id)
    {
        $size = Size::withTrashed()->findOrFail($id);
        $size->forceDelete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
}
