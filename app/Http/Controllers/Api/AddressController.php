<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Requests\Api\AddressRequest;
use App\Http\Resources\AddressCollection;
use App\Services\AddressService;

class AddressController extends MainController
{
    protected $address;
    public function __construct(AddressService $address){
        $this->address = $address;
    }
    public function index()
    {
        $auth = auth()->guard('api')->user();
        $user = User::find($auth->id);
        $addresses = $user->addresses()->with('city', 'region')->paginate($this->perPage);

        return $this->sendDataCollection(new AddressCollection($addresses));
    }
    public function show(string $id)
    {
        $user = auth()->guard('api')->user();
        $address = Address::where('user_id', $user->id)->where('id', $id)
            ->with('city', 'region')
            ->first();
        if (!$address) {
            return $this->messageError(__('api.address_not_found'));
        }
        return $this->sendData(new AddressResource($address));
    }
    public function store(AddressRequest $request)
    {
        $auth = auth()->guard('api')->user();
        $user = User::find($auth->id);
        $data = $request->validated();
        $data['user_id'] = $user->id;

        $result = $this->address->CheckValidateAddress($request->city_id, $request->region_id);

        if ($result !== true) {
            return $this->messageError($result);
        }
        $data['is_main'] = $this->address->getIsMain($user->id, $request->is_main, 'create');
        $user->addresses()->create($data);
        return $this->messageSuccess(__('api.address_added'));
    }

    public function update(AddressRequest $request, $id)
    {
        $auth = auth()->guard('api')->user();
        $user = User::find($auth->id);
        $address = Address::where('user_id', $user->id)->where('id', $id)->first();
        if (!$address) {
            return $this->messageError(__('api.address_not_found'));
        }
        $data = $request->validated();
        $data['user_id'] = $user->id;
        $data['is_main'] = $this->address->getIsMain($user->id, $request->is_main, 'update');
        $result = $this->address->CheckValidateAddress($request->city_id, $request->region_id);

        if ($result !== true) {
            return $this->messageError($result);
        }
        $address->update($data);
        return $this->messageSuccess(__('api.address_updated'));
    }

    public function destroy(string $id)
    {
        $auth = auth()->guard('api')->user();
        $user = User::find($auth->id);
        $address = $user->addresses()->where('id', $id)->first();
        if (!$address) {
            return $this->messageError(__('api.address_not_found'));
        }
        if ($address->is_main == 1) {
            return $this->messageError(__('api.not_delete_active_address'));
        }
        $address->delete();
        return $this->messageSuccess(__('api.address_deleted'));
    }
}
