<?php

namespace App\Helpers;

use App\Enums\StatusOrderItemReturnEnum;

class StatusOrderItemsReturnHelper
{
    public static function transitions(): array
    {
        return [

            StatusOrderItemReturnEnum::Request->value => StatusOrderItemReturnEnum::except([
            ]),
            StatusOrderItemReturnEnum::Pending->value => StatusOrderItemReturnEnum::except([
                StatusOrderItemReturnEnum::Request,
            ]),
            StatusOrderItemReturnEnum::Approved->value => StatusOrderItemReturnEnum::except([
                StatusOrderItemReturnEnum::Request,
                StatusOrderItemReturnEnum::Pending,
            ]),

            StatusOrderItemReturnEnum::Shipped->value => StatusOrderItemReturnEnum::except([
                StatusOrderItemReturnEnum::Request,
                StatusOrderItemReturnEnum::Pending,
                StatusOrderItemReturnEnum::Approved,
            ]),

            StatusOrderItemReturnEnum::Canceled->value => StatusOrderItemReturnEnum::only([
                StatusOrderItemReturnEnum::Canceled,
            ]),

            StatusOrderItemReturnEnum::Delivered->value => StatusOrderItemReturnEnum::only([
                StatusOrderItemReturnEnum::Delivered
            ]),

            StatusOrderItemReturnEnum::Rejected->value => StatusOrderItemReturnEnum::only([
                StatusOrderItemReturnEnum::Rejected
            ]),

        ];
    }


    public static function getAvailableTransitions(StatusOrderItemReturnEnum $status): array
    {
        return self::transitions()[$status->value] ?? [];
    }

    public static function canTransition(StatusOrderItemReturnEnum $from, StatusOrderItemReturnEnum $to): bool
    {
        return in_array($to, self::getAvailableTransitions($from));
    }

    public static function allStatuses(): array
    {
        return StatusOrderItemReturnEnum::cases();
    }

    public static function isFinal(StatusOrderItemReturnEnum $status): bool
    {
        return empty(self::getAvailableTransitions($status));
    }
}
