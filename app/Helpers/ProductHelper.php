<?php

namespace App\Helpers;

class ProductHelper
{

    public static function getProductRelationsInIndexDashboard()
    {
        return ['categories'];
    }

    public  static function getProductRelationsInShowDashboard()
    {
        return ['children.sizes', 'children.colors', 'children.images', 'categories'];
    }
}
