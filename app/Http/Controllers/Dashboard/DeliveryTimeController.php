<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\MainController;
use App\Http\Requests\dashboard\DeliveryTimeRequest;
use App\Models\DeliveryTime;

class DeliveryTimeController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setClass('delivery_times');
    }
    public function index()
    {
        $delivery_times = DeliveryTime::paginate($this->perPage);
        return view('admin.delivery_times.index', compact('delivery_times'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.delivery_times.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryTimeRequest $request)
    {
        DeliveryTime::create($request->all());
        return redirect()->route('dashboard.delivery_times.index')->with('success', __('site.delivery_time_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $delivery_time = DeliveryTime::findOrFail($id);
        return view('admin.delivery_times.edit', compact('delivery_time'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $delivery_time = DeliveryTime::findOrFail($id);
        return view('admin.delivery_times.edit', compact('delivery_time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $delivery_time = DeliveryTime::findOrFail($id);
        $delivery_time->update($request->all());
        return redirect()->route('dashboard.delivery_times.index')->with('success', __('site.delivery_time_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delivery_time = DeliveryTime::findOrFail($id);
        $delivery_time->delete();
        return redirect()->route('dashboard.delivery_times.index');
    }
    public function restore(string $id){
        $delivery_time = DeliveryTime::withTrashed()->findOrFail($id);
        $delivery_time->restore();
        return redirect()->route('dashboard.delivery_times.index')->with('success', __('site.restored_successfully'));
    }
    public function forceDelete(string $id){
        $delivery_time = DeliveryTime::withTrashed()->findOrFail($id);
        $delivery_time->forceDelete();
        return redirect()->route('dashboard.delivery_times.index')->with('success', __('site.deleted_successfully'));
    }
    
}
