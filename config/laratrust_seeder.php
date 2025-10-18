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
            'roles' => 'i,sh,s,u,a,d,fd,rd',
            'home' => 'i',
            "categories" => 'i,sh,s,u,a,d,fd,rd',
            "sizes" => 'i,sh,s,u,a,d,fd,rd',
            "cities" => 'i,sh,s,u,a,d,fd,rd',
            "regions" => 'i,sh,s,u,a,d,fd,rd',
            "pages" => 'i,sh,s,u,a,d,fd,rd',
            "contacts" => 'i,sh,a',
            "brands" => 'i,sh,s,u,a,d,fd,rd',
            "products" => 'i,sh,s,u,a,d,fd,rd',
            "reviews" => 'i,sh,s,u,a,d,fd,rd',
            'favorites' => 'i,sh',
            "settings" => 'i,sh,s,u,a,d',
            'users' => 'i,sh,s,u,a,d,fd,rd',
            "payments" => 'i,sh,s,u,a,d,fd,rd',
            "delivery_times" => "i,sh,s,u,a,d",
            "coupons" => 'i,sh,s,u,a,d',
            'activity_logs' => 'i,sh,u',
            "addresses" => 'i,sh,s,u,a,d',
            "colors" => 'i,sh,s,u,a,d',
            "orders" => 'i,sh,s,u,a,d',
            'notifications' => 'i,s,sh',


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
        'a' => 'active',
        'sh' => 'show',
        'fd' => 'forceDelete',
        'rd' => 'restore',
    ],
];
