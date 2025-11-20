<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\CityCollection;

class CityController extends MainController
{
    public function index()
    {
        $cities = City::filter()->paginate($this->perPage);
        return $this->sendDataCollection(new CityCollection($cities), __('site.cities'));
    }

    public function show(string $id)
    {
        $city = City::filter()->find($id);
        if (!$city) {
            return $this->messageError(__('api.city_not_found'));
        }
        return $this->sendData(new CityResource($city));
    }
}
