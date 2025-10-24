<?php

namespace App\Rules\Product;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueChildSizeRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_array($value)) {
            return;
        }

        $colorIds = array_column($value, 'color_id');

        if (count($colorIds) !== count(array_unique($colorIds))) {
            $fail(__('validation.duplicate_child_size'));
        }
    }
}
