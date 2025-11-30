<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Http\Requests\Api\ReviewRequest;
use App\Http\Resources\ReviewCollection;
use App\Http\Requests\Api\ReviewUpdateRequest;

class ReviewController extends MainController
{

    public function index()
    {
        $auth = Auth()->guard('api')->user();
        $reviews = $auth->reviews()->with('reviewable:id,name,content')->paginate($this->perPage);
        return $this->sendDataCollection(new ReviewCollection($reviews));
    }

    public function show(Review $review)
    {
        $auth = Auth()->guard('api')->user();
        $review = $auth->reviews()->with('reviewable')->where('id', $review->id)->first();
        if (!$review) {
            return $this->messageError(__('api.review_not_found'));
        }
        return $this->sendData(new ReviewResource($review));
    }

    public function store(ReviewRequest $request)
    {
        $auth = auth()->guard('api')->user();

        $data = $request->validated();
        $data['reviewable_type'] = match ($request->input('reviewable_type')) {
            'product' => Product::class,
            'order'   => Order::class,
        };

        $auth->reviews()->where('reviewable_id', $data['reviewable_id'])->where('reviewable_type', $data['reviewable_type'])->first();



        $auth->reviews()->create($data);

        return $this->messageSuccess(__('api.review_created'));
    }

    public function update(ReviewUpdateRequest $request, $id)
    {
        $auth = auth()->guard('api')->user();
        $review = $auth->reviews()->where('id', $id)->first();
        if (!$review) {
            return $this->messageError(__('api.review_not_found'));
        }

        $data = $request->validated();
        $review->update($data);
        return $this->messageSuccess(__('api.review_updated'));
    }

    public function destroy($id)
    {
        $auth = auth()->guard('api')->user();
        $review = $auth->reviews()->where('id', $id)->first();
        if (!$review) {
            return $this->messageError(__('api.review_not_found'));
        }
        $review->delete();
        return $this->messageSuccess(__('api.review_deleted'));
    }

    public function productReviews(Product $product)
    {
        if (!$product) {
            return $this->messageError(__('api.product_not_found'));
        }
        $reviews = $product->reviews()->with('user')->paginate($this->perPage);
        return $this->sendDataCollection(new ReviewCollection($reviews));
    }
}
