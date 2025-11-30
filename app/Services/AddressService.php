<?php

namespace App\Services;

use App\Models\City;
use App\Models\User;
use App\Models\Region;

class AddressService
{
    public function CheckValidateAddress($cityId, $regionId = null)
    {
        $city = City::find($cityId);

        if (! $city->active) {
            return __('api.city_not_active');
        }
        if ($regionId) {
            $region = Region::where('id', $regionId)->where('city_id', $cityId)->first();
            if (!$region) {
                return __('api.region_not_found_in_city');
            }
            if (! $region->active) {
                return __('api.region_not_active');
            }
        }

        return true;
    }

    public function getIsMain($userId, $is_main, $type = 'create')
    {
        $user = User::find($userId);
        $is_main = $is_main ?? 0;

        $checkedInt = $type == 'create' ? 0 : 1;

        if ($user->addresses()->count() == $checkedInt) {
            return 1;
        } else {
            if ($is_main) {
                $user->addresses()->where('is_main', 1)->update(['is_main' => 0]);
            }
            return $is_main;
        }
    }
}
