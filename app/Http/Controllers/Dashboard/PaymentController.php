<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\PaymentRequest;
use App\Models\Payment;
use App\Services\ImageHandlerService;
use Illuminate\Http\Request;

class PaymentController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    protected $imageService;
    public function __construct(ImageHandlerService $imageService)
    {
        parent::__construct();
        $this->setClass('payments');
        $this->imageService = $imageService;
    }
    public function index()
    {
        $payments=Payment::paginate($this->perPage);
        return view('admin.payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $imageUrl = $this->imageService->uploadImage('payments', $request);
        $data = $request->except('image');
        $data['image'] = $imageUrl['image'];
        Payment::create($data);
        return redirect()->route('dashboard.payments.index')->with('success', __('site.payment_created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::findOrFail($id);
        return view('admin.payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment = Payment::find($id);
        return view('admin.payments.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, string $id)
    {
        $payment = Payment::findOrFail($id);
        $imgUrl = $this->imageService->editImage($request, $payment, 'payments');
        $data = $request->except('image');

        $data['image'] = $imgUrl['image']; ;

        $payment->update($data);
        return redirect()->route('dashboard.payments.index')->with('success', __('site.payment_updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('dashboard.payments.index')->with('success', __('site.payment_deleted_successfully'));
    }
    public function forceDelete(string $id){
        $payment = Payment::withTrashed()->findOrFail($id);
        $this->imageService->deleteImage($payment->image);
        $payment->forceDelete();
        return redirect()->route('dashboard.payments.index')->with('success', __('site.deleted_successfully'));
    }
    public function restore(string $id){
        $payment = Payment::withTrashed()->findOrFail($id);
        $payment->restore();
        return redirect()->route('dashboard.payments.index')->with('success', __('site.restored_successfully'));
    }

    
}
