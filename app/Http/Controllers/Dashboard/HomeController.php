<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\MainController;

class HomeController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->setClass('home');
    }
    public function index()
    {
        return view('admin.home.index');
    }
}
