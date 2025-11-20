<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CityRequest;

class CityController extends MainController
{
    /**
     * Display a listing of the resource.
     */
   public function __construct()
    {
        parent::__construct();
        $this->setClass('cities');
    }
    public function index()
    {
        $cities = City::filter(request())->paginate($this->perPage);
        return view('admin.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $request['country_id'] = 1;
        City::create($request->all());
        return redirect()->route('dashboard.cities.index')->with('success', __('site.added_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $city = City::find($id);
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $city = City::find($id);
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, string $id)
    {
        $city = City::find($id);
        $city->update($request->all());
        return redirect()->route('dashboard.cities.index')->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
        $city->delete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $city = City::withTrashed()->find($id);
        $city->restore();
        return redirect()->back()->with('success', __('site.restored_successfully'));
    }
    public function forceDelete(string $id)
    {
        $city = City::withTrashed()->find($id);
        $city->forceDelete();
        return redirect()->back()->with('success', __('site.deleted_successfully'));
    }
}
