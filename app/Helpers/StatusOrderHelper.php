<?php

namespace App\Helpers;

use App\Enums\StatusOrderEnum;

class StatusOrderHelper
{
    public static function transitions(): array
    {
        return [
            StatusOrderEnum::Request->value => StatusOrderEnum::cases(),

            StatusOrderEnum::Pending->value => StatusOrderEnum::except([
                StatusOrderEnum::Request
            ]),

            StatusOrderEnum::Approved->value => StatusOrderEnum::except([
                StatusOrderEnum::Request
            ]),

            StatusOrderEnum::Preparing->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved
            ]),

            StatusOrderEnum::PreparingFinished->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                StatusOrderEnum::Preparing
            ]),

            StatusOrderEnum::DeliveryGo->value => StatusOrderEnum::except([
                StatusOrderEnum::Request,
                StatusOrderEnum::Pending,
                StatusOrderEnum::Approved,
                StatusOrderEnum::Preparing,
                StatusOrderEnum::PreparingFinished
            ]),

            StatusOrderEnum::Delivered->value => [],

            StatusOrderEnum::Canceled->value => StatusOrderEnum::only([
                StatusOrderEnum::Canceled,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Rejected
            ]),

            StatusOrderEnum::Returned->value => StatusOrderEnum::only([
                StatusOrderEnum::Canceled,
                StatusOrderEnum::Returned,
                StatusOrderEnum::Rejected
            ]),

            StatusOrderEnum::Rejected->value => StatusOrderEnum::only([
                StatusOrderEnum::Canceled,
                StatusOrderEnum::Returned,
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
