<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class OfferAmountAddRule implements ValidationRule
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $offerAmountAdd = $this->request->get('offer_amount_add');
        $offerAmount = $this->request->get('offer_amount');

        if (!is_numeric($offerAmountAdd) || !is_numeric($offerAmount)) {
            return;
        }

       
        $offerAmountAdd = (float) $offerAmountAdd;
        $offerAmount = (float) $offerAmount;

        
        if ($offerAmountAdd >= $offerAmount) {
            $fail(__('validation.offer_amount_add_smaller_than_offer_amount'));
        }
      
        
        
    }
}