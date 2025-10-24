<?php

namespace App\Rules\Product;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OfferRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->request->boolean('is_offer')) {
            $offer_price = $this->request->offer_price;
            if (!$this->request->filled('offer_price') || $offer_price <= 0) {
                $fail(__('validation.offer_price_required'));
            }
        }
    }
}
