<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'roles' => 'i,sh,s,u,a,d',
            'home' => 'i',

            // 'users' => 'i,sh,s,u,a,d',
            // "units" => 'i,sh,s,u,a,d',
            // "brands" => 'i,sh,s,u,a,d',

            // "sizes" => 'i,sh,s,u,a,d',
            // "services" => 'i,sh,s,u,a,d',
            // "categories" => 'i,sh,s,u,a,d',
            // "products" => 'i,sh,s,u,a,d',
            // 'additions' => 'i,sh,s,u,a,d',
            // 'wishlists'=>'i,sh',
            // "cities" => 'i,sh,s,u,a,d',
            // "regions" => 'i,sh,s,u,a,d',
            // "settings" => 'i,sh,s,u,a,d',
            // "contacts" => 'i,sh,s,u,a,d',
            // "delivery_times"=>"i,sh,s,u,a,d",
            // "pages" => 'i,sh,s,u,a,d',
            // "payments" => 'i,sh,s,u,a,d',
            // "addresses" => 'i,sh,s,u,a,d',
            // "sliders" => 'i,sh,s,u,a,d',
            // "orders" => 'i,sh,s,u,a,d',
            // "coupons" => 'i,sh,s,u,a,d',
            // "reviews" => 'i,sh,s,u,a,d',
            // 'activity_logs' => 'i',
            // 'notifications' => 'i,s,sh',
            // 'trash_buckets'=>'i',


        ],
        'admin' => [
            'users' => 'i,sh,s,u,d,a',

        ],

    ],

    'permissions_map' => [
        'i' => 'index',
        's' => 'store',
        'u' => 'update',
        'd' => 'destroy',
        'a'=>'active',
        'sh' => 'show',
    ],
];
