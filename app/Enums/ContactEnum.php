<?php

namespace App\Enums;

enum ContactEnum: string
{
    case INQUIRY    = 'inquiry';
    case COMPLAINT  = 'complaint';
    case SUGGESTION = 'suggestion';
    case FEEDBACK   = 'feedback';
    case SUPPORT    = 'support';
    case OTHER      = 'other';
    public function label(): string
    {
        return match ($this) {
            self::INQUIRY    => __("site.inquiry"),
            self::COMPLAINT  => __("site.complaint"),
            self::SUGGESTION => __("site.suggestion"),
            self::FEEDBACK   => __("site.feedback"),
            self::SUPPORT    => __("site.support"),
            self::OTHER      => __("site.other"),
        };
    }
    public static function options(): array
    {
        return array_map(fn($case) => ['value' => $case->value, 'label' => $case->label()], self::cases());
    }
}
