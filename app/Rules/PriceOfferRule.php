<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PriceOfferRule implements ValidationRule
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $offerPrice = $this->request->get('offer_price');
        $isOffer = $this->request->get('is_offer');
        if (!is_numeric($offerPrice)) {
            return;
        }
        if ($isOffer == 0) {
            $fail(__('validation.offer_price_required_when_is_offer_true'));
        }
        if ($offerPrice < $this->request->price) {
            $fail(__('validation.offer_price_bigger_than_price'));
        }
    }
}
