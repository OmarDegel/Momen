<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends MainController
{
    public function __construct(){
        parent::__construct();
        $this->setClass('colors');
    }
    public function index()
    {
        $colors=Color::filter(request())->paginate($this->perPage);
        return view('admin.colors.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.colors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        Color::create($request->validated());
        return redirect()->route('dashboard.colors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $color=Color::findOrFail($id);
        return view('admin.colors.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, string $id)
    {
        $color=Color::findOrFail($id);
        $color->update($request->validated());
        return redirect()->route('dashboard.colors.index');
    }


    
}
