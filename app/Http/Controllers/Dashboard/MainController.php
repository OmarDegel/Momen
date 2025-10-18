<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Facades\SettingFacade as AppSettings;


class MainController extends Controller
{
    protected $class;
    protected $perPage;
    protected $result;

    public function __construct()
    {

        $this->perPage = request()->get('per_page', $this->result);
        if ($this->perPage > 250) {
            $this->perPage = 250;
        }
    }


    protected function setClass($class)
    {
        $this->class = $class;
        View::share('class', $class);
    }
}
