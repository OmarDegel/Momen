<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;

class UniqueChildColorRule implements ValidationRule
{
    protected array $allChildren;
    protected int $currentIndex;
    protected array $colorIds = [];

    public function __construct(array $allChildren, int $currentIndex)
    {
        $this->allChildren = $allChildren;
        $this->currentIndex = $currentIndex;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // 1. جمع كل الألوان المحددة في الـ Repeater
        foreach ($this->allChildren as $index => $child) {
            // تجاهل الصف الحالي أثناء التحقق إذا كانت نفس القيمة
            if ($index === $this->currentIndex) {
                continue;
            }

            // تأكد أن المفتاح موجود وقيمة اللون موجودة
            if (isset($child['color_id'])) {
                $this->colorIds[] = $child['color_id'];
            }
        }

        // 2. التحقق من التكرار
        if (in_array($value, $this->colorIds)) {
            $fail(__('validation.unique_color_in_children'));
        }
    }
}
