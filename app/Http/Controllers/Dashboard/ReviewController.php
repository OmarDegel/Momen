<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ReviewRequest;
use App\Http\Controllers\Dashboard\MainController;

class ReviewController extends MainController
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setClass('reviews');
    }
    public function index()
    {
        $reviews = Review::filter(request())->paginate($this->perPage);
        $users = User::select('id', 'name_first', 'name_last')->get()
            ->mapWithKeys(fn($user) => [$user->id => $user->name_first . ' ' . $user->name_last])
            ->toArray();
        $products = Product::select('id', 'name')
            ->get()
            ->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])
            ->toArray();
        return view('admin.reviews.index', compact('reviews', 'users', 'products'));
    }
    public function create()
    {
        $products = Product::all()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();
        return view('admin.reviews.create', compact('products'));
    }
    public function store(ReviewRequest $request)
    {
        $data = $request->validated();
        $data['reviewable_type'] = Product::class;
        $data['reviewable_id'] = $data['product_id'];

        unset($data['product_id']);

        Review::create($data);

        return redirect()->route('dashboard.reviews.index')->with('success', __('site.created'));
    }
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }
    public function edit(Review $review)
    {
        $products = Product::all()->mapWithKeys(fn($product) => [$product->id => $product->nameLang()])->toArray();
        return view('admin.reviews.edit', compact('review', 'products'));
    }
    public function update(ReviewRequest $request, Review $review)
    {
        $data = $request->validated();
        $data['reviewable_type'] = Product::class;
        $data['reviewable_id'] = $data['product_id'];

        unset($data['product_id']);

        $review->update($data);
        return redirect()->route('dashboard.reviews.index')->with('success', __('site.updated'));
    }
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('dashboard.reviews.index')->with('success', __('site.deleted'));
    }
    public function restore(Review $review)
    {
        $review->restore();
        return redirect()->route('dashboard.reviews.index')->with('success', __('site.restored'));
    }
    public function forceDelete(Review $review)
    {
        $review->forceDelete();
        return redirect()->route('dashboard.reviews.index')->with('success', __('site.deleted'));
    }
}
