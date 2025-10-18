<?php

namespace App\Enums;

enum StatusOrderEnum: string
{
    case Request = 'request';
    case Pending = 'pending';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Preparing = 'preparing';
    case PreparingFinished = 'preparingFinished';
    case DeliveryGo = 'deliveryGo';
    case Delivered = 'delivered';
    case Canceled = 'canceled';
    case Returned = 'returned';

    public function label(): string
    {
        return __('site.' . $this->value);
    }

    public static function except(array $excluded): array
    {
        return array_values(array_filter(
            self::cases(),
            fn(self $case) => !in_array($case, $excluded, true)
        ));
    }

    public static function only(array $only): array
    {
        return array_values(array_filter(
            self::cases(),
            fn(self $case) => in_array($case, $only, true)
        ));
    }


}
