<?php

namespace App\Helpers;

use App\Enums\StatusOrderEnum;

class StatusOrderHelper
{
    public static function transitions(): array
    {
        return [
            StatusOrderEnum::Request->value => StatusOrderEnum::except([
                StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,
            ]),

            StatusOrderEnum::Pending->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                 StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,

            ]),

            StatusOrderEnum::Approved->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                 StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,

            ]),

            StatusOrderEnum::Preparing->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                 StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,

            ]),

            StatusOrderEnum::PreparingFinished->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                StatusOrderEnum::Preparing,
                 StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,

            ]),

            StatusOrderEnum::DeliveryGo->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                StatusOrderEnum::Preparing,
                StatusOrderEnum::PreparingFinished,
                 StatusOrderEnum::ReturnedPartial,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Canceled,

            ]),

            StatusOrderEnum::Delivered->value => [StatusOrderEnum::Delivered],

            StatusOrderEnum::Canceled->value => StatusOrderEnum::only([
                StatusOrderEnum::Canceled,
            ]),

            StatusOrderEnum::Returned->value => StatusOrderEnum::only([
                StatusOrderEnum::Returned,
            ]),
            StatusOrderEnum::ReturnedPartial->value => StatusOrderEnum::only([
                StatusOrderEnum::ReturnedPartial,
            ]),

            StatusOrderEnum::Rejected->value => StatusOrderEnum::only([
                StatusOrderEnum::Rejected
            ]),
        ];
    }


    public static function getAvailableTransitions(StatusOrderEnum $status): array
    {
        return self::transitions()[$status->value] ?? [];
    }

    public static function canTransition(StatusOrderEnum $from, StatusOrderEnum $to): bool
    {
        return in_array($to, self::getAvailableTransitions($from));
    }

    public static function allStatuses(): array
    {
        return StatusOrderEnum::cases();
    }

    public static function isFinal(StatusOrderEnum $status): bool
    {
        return empty(self::getAvailableTransitions($status));
    }
}
