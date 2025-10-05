<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\RegionRequest;

class RegionController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setClass('regions');
    }
    public function index()
    {
        $regions = Region::filter(request())->with('city')->paginate($this->perPage);
        $cities = City::all()->mapWithKeys(function ($city) {
            return [$city->id => $city->nameLang()];
        })->toArray();
        return view('admin.regions.index', compact('regions', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all()->mapWithKeys(function ($city) {
            return [$city->id => $city->nameLang()];
        });;
        return view('admin.regions.create', compact('cities'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionRequest $request)
    {
        Region::create($request->all());
        return redirect()->route('dashboard.regions.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $region = Region::find($id);
        $cities = City::all()->mapWithKeys(function ($city) {
            return [$city->id => $city->nameLang()];
        });;
        return view('admin.regions.edit', compact('region', 'cities'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $region = Region::find($id);
        $cities = City::all()->mapWithKeys(function ($city) {
            return [$city->id => $city->nameLang()];
        });;
        return view('admin.regions.edit', compact('region', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegionRequest $request, string $id)
    {
        $region = Region::find($id);
        $region->update($request->all());
        return redirect()->route('dashboard.regions.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $region = Region::find($id);
        $region->delete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function forceDelete(string $id)
    {
        $region = Region::withTrashed()->find($id);
        $region->forceDelete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $region = Region::withTrashed()->find($id);
        $region->restore();
        return redirect()->back()->with('success', __('site.restored_successfully'));
    }
}
