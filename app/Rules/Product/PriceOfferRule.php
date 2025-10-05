<?php

namespace App\Rules\Product;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PriceOfferRule implements ValidationRule
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
        if ($this->request->offer_price < $this->request->price) {
            $fail(__('validation.offer_price_bigger_than_price'));
        }
    }
}
