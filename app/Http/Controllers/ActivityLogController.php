<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Dashboard\MainController;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends MainController
{
    /**
     * Display a listing of the resource.
     */
     public function __construct(){
        parent::__construct();
        $this->setClass('activity_logs');
     }
    public function index()
    {
        $logs = ActivityLog::paginate($this->perPage);
        return view('admin.activity_logs.index', compact('logs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = ActivityLog::find($id);
        return view('admin.activity_logs.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
