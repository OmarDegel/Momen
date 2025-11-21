<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OfferRule implements ValidationRule
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }



    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->request->boolean('is_offer')) {
            $offerFields = array_filter([
                'offer_price' => $this->request->offer_price,
                'offer_amount' => $this->request->offer_amount,
                'offer_amount_add' => $this->request->offer_amount_add,
            ]);
            if (count($offerFields) == 0) {
                $fail(__('validation.you_must_select_an_offer'));
            }
        }
    }
}
