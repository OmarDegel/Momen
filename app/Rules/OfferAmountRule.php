<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OfferAmountRule implements ValidationRule
{
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $isOffer = $this->request->get('is_offer');
        if ($isOffer == 0) {
            $fail(__('validation.offer_amount_required_when_is_offer_true'));
        }
    }
}
