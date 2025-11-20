<?php

namespace App\Http\Controllers\Api;

use App\Services\HomeSevice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;

class HomeController extends MainController
{
    protected $homeService;

    public function __construct(HomeSevice $homeService)
    {
        $this->homeService = $homeService;
    }
    public function index(Request $request)
    {
        $logic = $this->homeService->getHomeData();
        $data = new HomeResource((object)$logic);
        return $this->sendData($data);
    }
}
