<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\User;
use App\Models\Region;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AddressRequest;

class AddressController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setClass('addresses');
    }
    private function getFormData()
    {
        $users = User::select('id', 'name_first', 'name_last')
            ->get()
            ->mapWithKeys(fn($user) => [$user->id => $user->name_first . ' ' . $user->name_last])
            ->toArray();

        $cities = City::select('id', 'name')
            ->get()
            ->mapWithKeys(fn($city) => [$city->id => $city->namelang()])
            ->toArray();

        $regions = Region::select('id', 'name')
            ->get()
            ->mapWithKeys(fn($region) => [$region->id => $region->namelang()])
            ->toArray();

        return compact('users', 'cities', 'regions');
    }

    public function index()
    {
        $addresses = Address::with("city", "region", "user")->paginate($this->perPage);
        return view('admin.addresses.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->getFormData();
        return view('admin.addresses.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        Address::create($request->validated());
        return redirect()->route('dashboard.addresses.index')->with('success', __('site.address_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $address = Address::findOrFail($id);
        $data = $this->getFormData();
        return view('admin.addresses.show', array_merge($data, compact('address')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address = Address::findOrFail($id);
        $data = $this->getFormData();
        return view('admin.addresses.edit', array_merge($data, compact('address')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, string $id)
    {
        $address = Address::findOrFail($id);
        $address->update($request->validated());
        return redirect()->route('dashboard.addresses.index')->with('success', __('site.address_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = Address::findOrFail($id);
        $address->delete();
        return redirect()->route('dashboard.addresses.index')->with('success', __('site.address_deleted_successfully'));
    }

    public function forceDelete(string $id)
    {
        $address = Address::withTrashed()->findOrFail($id);
        $address->forceDelete();
        return redirect()->route('dashboard.addresses.index')->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id)
    {
        $address = Address::withTrashed()->findOrFail($id);
        $address->restore();
        return redirect()->route('dashboard.addresses.index')->with('success', __('site.restored_successfully'));
    }
}
