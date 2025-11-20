<?php

namespace App\Http\Controllers\Api;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RegionResource;
use App\Http\Requests\Api\RegionRequest;
use App\Http\Resources\RegionCollection;

class RegionController extends MainController
{
    public function index(RegionRequest $requst)
    {
        $regions = Region::with('city')->filter()->paginate($this->perPage);
        return $this->sendDataCollection(new RegionCollection($regions));
    }

    public function show(string $id)
    {
        $region = Region::with('city')->filter()->where('id', $id)->first();
        if (!$region) {
            return $this->messageError(__('api.region_not_found'));
        }
        return $this->sendData(new RegionResource($region));
    }
}
