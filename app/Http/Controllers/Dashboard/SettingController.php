<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageHandlerService;
use Illuminate\Support\Facades\Storage;

class SettingController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    protected $imageService;
    public function __construct(ImageHandlerService $imageHandlerService)
    {
        parent::__construct();
        $this->setClass('settings');
        $this->imageService = $imageHandlerService;
    }
    public function index()
    {
        $setting = (object)[
            'id' => 1
        ];

        return view('admin.settings.index', [
            'site_title'   => setting('site_title'),
            'site_phone'   => setting('site_phone'),
            'site_email'   => setting('site_email'),
            'min_order'    => setting('min_order'),
            'max_order'    => setting('max_order'),
            'delivery_cost' => setting('delivery_cost'),
            'site_open'    => setting('site_open'),
            'logo_image'         => setting('logo_image'),
            'facebook'         => setting('facebook'),
            'twitter'          => setting('twitter'),
            'snapchat'         => setting('snapchat'),
            'youtube'          => setting('youtube'),
            'instagram'        => setting('instagram'),
            'whatsapp'         => setting('whatsapp'),
            "setting" => $setting
        ]);
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
        //
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
    public function update(Request $request)
    {
        $data = $request->except('logo_image', '_token', '_method');
        if ($request->hasFile('logo_image')) {
            $filename = time() . '_' . $request->file('logo_image')->getClientOriginalName();

            $request->file('logo_image')->move(public_path('uploads'), $filename);

            $old = setting('logo_image');
            if ($old && file_exists(public_path($old))) {
                unlink(public_path($old));
            }

            $data['logo_image'] = 'uploads/' . $filename;
        }
        foreach ($data as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }

        return redirect()->back()->with('success', __('site.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
