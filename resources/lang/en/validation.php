<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field must be a valid URL.',
    'after' => 'The :attribute field must be a date after :date.',
    'after_or_equal' => 'The :attribute field must be a date after or equal to :date.',
    'alpha' => 'The :attribute field must only contain letters.',
    'alpha_dash' => 'The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field must only contain letters and numbers.',
    'array' => 'The :attribute field must be an array.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'The :attribute field must be a date before :date.',
    'before_or_equal' => 'The :attribute field must be a date before or equal to :date.',
    'between' => [
        'array' => 'The :attribute field must have between :min and :max items.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute field must be between :min and :max.',
        'string' => 'The :attribute field must be between :min and :max characters.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'can' => 'The :attribute field contains an unauthorized value.',
    'confirmed' => 'The :attribute field confirmation does not match.',
    'current_password' => 'The password is incorrect.',
    'date' => 'The :attribute field must be a valid date.',
    'date_equals' => 'The :attribute field must be a date equal to :date.',
    'date_format' => 'The :attribute field must match the format :format.',
    'decimal' => 'The :attribute field must have :decimal decimal places.',
    'declined' => 'The :attribute field must be declined.',
    'declined_if' => 'The :attribute field must be declined when :other is :value.',
    'different' => 'The :attribute field and :other must be different.',
    'digits' => 'The :attribute field must be :digits digits.',
    'digits_between' => 'The :attribute field must be between :min and :max digits.',
    'dimensions' => 'The :attribute field has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email' => 'The :attribute field must be a valid email address.',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => 'The :attribute field must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute field must have more than :value items.',
        'file' => 'The :attribute field must be greater than :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than :value.',
        'string' => 'The :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than or equal to :value.',
        'string' => 'The :attribute field must be greater than or equal to :value characters.',
    ],
    'hex_color' => 'The :attribute field must be a valid hexadecimal color.',
    'image' => 'The :attribute field must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field must exist in :other.',
    'integer' => 'The :attribute field must be an integer.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'lowercase' => 'The :attribute field must be lowercase.',
    'lt' => [
        'array' => 'The :attribute field must have less than :value items.',
        'file' => 'The :attribute field must be less than :value kilobytes.',
        'numeric' => 'The :attribute field must be less than :value.',
        'string' => 'The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'The :attribute field must not have more than :max items.',
        'file' => 'The :attribute field must not be greater than :max kilobytes.',
        'numeric' => 'The :attribute field must not be greater than :max.',
        'string' => 'The :attribute field must not be greater than :max characters.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'The :attribute field must have at least :min items.',
        'file' => 'The :attribute field must be at least :min kilobytes.',
        'numeric' => 'The :attribute field must be at least :min.',
        'string' => 'The :attribute field must be at least :min characters.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'The :attribute field must be a number.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'present_if' => 'The :attribute field must be present when :other is :value.',
    'present_unless' => 'The :attribute field must be present unless :other is :value.',
    'present_with' => 'The :attribute field must be present when :values is present.',
    'present_with_all' => 'The :attribute field must be present when :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute field format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute field must match :other.',
    'size' => [
        'array' => 'The :attribute field must contain :size items.',
        'file' => 'The :attribute field must be :size kilobytes.',
        'numeric' => 'The :attribute field must be :size.',
        'string' => 'The :attribute field must be :size characters.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => 'The :attribute field must be a string.',
    'timezone' => 'The :attribute field must be a valid timezone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute field must be uppercase.',
    'url' => 'The :attribute field must be a valid URL.',
    'ulid' => 'The :attribute field must be a valid ULID.',
    'uuid' => 'The :attribute field must be a valid UUID.',
    'required' => 'The :attribute field is required.',
    'email'    => 'The :attribute must be a valid email address.',
    'url'      => 'The :attribute must be a valid URL.',
    'max'      => [
        'string' => 'The :attribute may not be greater than :max characters.',
    ],
    'ar' => [
        'name' => 'Arabic Name'
    ],
    'en' => [
        'name' => 'English Name'
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'site_title' => [
            'required' => 'The site title is required.',
        ],
        'site_email' => [
            'required' => 'The site email is required.',
            'email'    => 'The email must be a valid email address.',
        ],
        'site_phone' => [
            'required' => 'The site phone is required.',
        ],
        'facebook' => [
            'url' => 'The Facebook URL must be valid.',
        ],
        'twitter' => [
            'url' => 'The Twitter URL must be valid.',
        ],
        'instagram' => [
            'url' => 'The Instagram URL must be valid.',
        ],
        'linkedin' => [
            'url' => 'The LinkedIn URL must be valid.',
        ],
        'gmail' => [
            'email' => 'The Gmail email must be valid.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],


    // validaation mesaages

    'name_required' => 'The name is required.',
    'name_string' => 'The name must be a string.',
    'name_unique' => 'The name must be a unique.',
    'display_name_required' => 'The display name is required.',
    'display_name_string' => 'The display name must be a string.',
    'display_name_unique' => 'The display name must be a unique.',
    'permissions_array' => 'The permissions must be an array.',
    'permissions_required' => 'The permissions field is required.',
    'the_name_required' => 'The name field is required.',
    'the_name_string' => 'The name must be a valid string.',
    'the_phone_required' => 'The phone field is required.',
    'the_phone_string' => 'The phone must be a valid string.',
    'the_phone_unique' => 'The phone number is already registered.',
    'the_phone_regex' => 'The phone number must be a valid Egyptian number, consisting of 11 digits and starting with 01.',
    'the_password_required' => 'The password field is required.',
    'the_password_confirmed' => 'The password confirmation does not match.',
    'the_password_min' => 'The password must be at least 8 characters long.',
    'the_password_max' => 'The password must not exceed 32 characters.',
    'the_role_id_required' => 'The role field is required.',
    'the_role_id_exists' => 'The selected role does not exist.',
    'the_phone_required' => 'The phone number is required.',
    'the_phone_string' => 'The phone number must be a valid string.',
    'the_phone_regex' => 'The phone number must be a valid Egyptian number with 11 digits starting with 01.',
    'the_phone_unique' => 'The phone number is already registered.',
    'the_name_required' => 'The name is required.',
    'the_name_string' => 'The name must be a valid string.',
    'the_name_max' => 'The name must not exceed 50 characters.',
    'the_gender_required' => 'The gender is required.',
    'the_gender_in' => 'The selected gender is invalid.',
    'the_region_id_required' => 'The region is required.',

    'name_en_required' => 'The English name is required.',
    'name_en_string' => 'The English name must be a valid string.',
    'name_en_max' => 'The English name must not exceed 50 characters.',
    'name_en_regex' => 'The English name must contain only English letters.',
    'name_en_unique' => 'The English name is already in use.',

    'name_ar_required' => 'The Arabic name is required.',
    'name_ar_string' => 'The Arabic name must be a valid string.',
    'name_ar_max' => 'The Arabic name must not exceed 50 characters.',
    'name_ar_regex' => 'The Arabic name must contain only Arabic letters.',
    'name_ar_unique' => 'The Arabic name is already in use.',

    'description_en_nullable' => 'The English description can be nullable.',
    'description_en_string' => 'The English description must be a valid string.',
    'description_en_max' => 'The English description must not exceed 250 characters.',
    'description_en_regex' => 'The English discription must contain only English letters.',

    'description_ar_nullable' => 'The Arabic description can be nullable.',
    'description_ar_string' => 'The Arabic description must be a valid string.',
    'description_ar_max' => 'The Arabic description must not exceed 250 characters.',
    'description_ar_regex' => 'The Arabic description must contain only Arabic letters.',

    'active_required' => 'The active status is required.',

    'name_en_required' => 'The English name is required.',
    'name_en_string' => 'The English name must be a valid string.',
    'name_en_max' => 'The English name must not exceed 50 characters.',
    'name_en_regex' => 'The English name must contain only English letters.',

    'name_ar_required' => 'The Arabic name is required.',
    'name_ar_string' => 'The Arabic name must be a valid string.',
    'name_ar_max' => 'The Arabic name must not exceed 50 characters.',
    'name_ar_regex' => 'The Arabic name must contain only Arabic letters.',

    'description_en_nullable' => 'The English description can be nullable.',
    'description_en_string' => 'The English description must be a valid string.',
    'description_en_max' => 'The English description must not exceed 250 characters.',
    'description_en_regex' => 'The English description must contain only English letters.',

    'description_ar_nullable' => 'The Arabic description can be nullable.',
    'description_ar_string' => 'The Arabic description must be a valid string.',
    'description_ar_max' => 'The Arabic description must not exceed 250 characters.',
    'description_ar_regex' => 'The Arabic description must contain only Arabic letters.',

    'category_id_required' => 'The category field is required.',
    'category_id_exists' => 'The selected category does not exist.',
    'unit_price' => 'Unit Price',

    'name_required' => 'The name field is required.',
    'name_string' => 'The name must be a string.',
    'phone_regex' => 'The phone number is invalid.',
    'phone_unique' => 'The phone number already exists.',

    'password_confirmed' => 'The password confirmation does not match.',
    'password_min' => 'The password must be at least 8 characters long.',

    'title_ar_required' => 'The Arabic title is required.',
    'title_ar_string' => 'The Arabic title must be a string.',
    'title_ar_regex' => 'The Arabic title format is invalid.',

    'title_en_required' => 'The English title is required.',
    'title_en_string' => 'The English title must be a string.',
    'title_en_regex' => 'The English title format is invalid.',

    'description_ar_nullable' => 'The Arabic description is optional.',
    'description_ar_string' => 'The Arabic description must be a string.',
    'description_ar_min' => 'The Arabic description must be at least 10 characters long.',
    'description_ar_max' => 'The Arabic description may not be greater than 500 characters.',
    'description_en_required' => 'The English description is required.',


    'description_ar_required' => 'The Arabic description is required.',
    'description_en_nullable' => 'The English description is optional.',
    'description_en_string' => 'The English description must be a string.',
    'description_en_min' => 'The English description must be at least 10 characters long.',
    'description_en_max' => 'The English description may not be greater than 500 characters.',

    'priority_in' => 'The priority must be one of the valid values.',
    'repeating_in' => 'The repeating must be one of the valid values.',

    'region_id_required' => 'The region is required.',
    'region_id_exists' => 'The region does not exist.',

    'volunteer_id_required' => 'The volunteer ID is required.',
    'volunteer_id_exists' => 'The volunteer does not exist.',

    'category_case_id_required' => 'The category case ID is required.',
    'category_case_id_exists' => 'The category case does not exist.',

    'items_required_without' => 'Items are required when no items are present.',
    'items_item_id_required_without' => 'The item ID is required when no items are present.',
    'items_item_id_exists' => 'The item ID does not exist.',
    'items_amount_required_without' => 'The amount is required when no items are present.',
    'items_amount_numeric' => 'The amount must be a number.',
    'items_amount_min' => 'The amount must be at least 1.',

    'price_required_without' => 'The price is required when no items are present.',
    'price_numeric' => 'The price must be a number.',
    'price_min' => 'The price must be at least 0.',

    'images_image' => 'The image must be valid.',
    'images_mimes' => 'The image extension is invalid.',
    'images_max' => 'The image may not be greater than 2MB.',
    'you_cant_enter_both_price_and_items' => 'You can\'t enter both price and items.',
    'image_image' => 'The image must be a valid image file.',
    'image_mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
    'image_max' => 'The image may not be greater than 2048 kilobytes.',
    'image_required' => 'The image field is required.',
    'image_dimensions' => 'The image dimensions are invalid. The width and height must be at least 100 pixels and at most 1000 pixels.',
    'image_size' => 'The image size must be at least 100x100 pixels and at most 1000x100 pixels.',
    'image_valid' => 'The image must be a valid image file.',

    'address_string' => 'The address must be a string.',
    'address_max' => 'The address may not be greater than 1000 characters.',
    'store_type_id_exists' => 'The selected store type is invalid.',
    'store_type_id_required' => 'The store type is required.',
    'order_id_integer' => 'The order ID must be an integer.',
    'order_id_min' => 'The order ID must be at least 0.',
    'order_id_max' => 'The order ID must not exceed 9999999999999999.',
    'address_required' => 'The address field is required.',

    "order_id_required"=>"Order id is required",
    "city_id_required"=>"City is required",
    "shipping_required"=>"Shipping is required",
    "shipping_numeric"=>"Shipping must be numeric",
    "one_of_this_fields_required"=>"One of this fields requred (link , product)",
    'you_must_select_an_offer' => 'You must select an offer: percentage, amount, or price.',
    'you_must_select_one_offer' => 'You must select one offer: percentage, amount, or price.',
    'shipping_cost_must_be_zero' => 'The shipping cost must be zero when the free shipping option is selected.',
    'shipping_cost_required' => 'The shipping cost is required.',
    'order_max_smaller_than_amount' => 'The order max must be smaller than the amount.',
    'invalid_category_for_service' => 'The category is invalid for this service.',
    'offer_price_bigger_than_price' => 'The price befor offer must be bigger than the price.',
    'offer_percent_smaller_than_price' => 'The discount value must be less than the original price.',

    'duplicate_child_size' => 'Duplicate child size.',
    'child_amount_gt_max_order' => 'The amount for child product number :child must be greater than the maximum order limit (:max_order).',

    'offer_required_one' => 'You must select at least one offer type.',
    'offer_required_only_one' => 'You must select only one offer type.',
    'amount_less_than_max' => 'The sub-product quantity must be greater than the maximum order limit.',
    'offer_price_must_be_greater_than' => 'The offer price must be greater than the regular price.',
    'duplicate_size' => 'This size is already used. Please select a different size.',
    'check_form_before_submit' => '⚠️ Please make sure all fields are filled correctly before saving.',

    "product_id_required"=>"Product id is required",
    "product_id_exists"=>"Product id is not exists",
    "user_id_required"=>"User id is required",
    "user_id_exists"=>"User id is not exists",
    "rate_required"=>"Rate is required",
    "rate_integer"=>"Rate must be integer",
    "rate_min"=>"Rate must be at least 1",
    "rate_max"=>"Rate must be at most 5",
    "comment_required"=>"Comment is required",
    "comment_string"=>"Comment must be string",
    "active_required"=>"Active is required",
    "active_boolean"=>"Active must be boolean",




];
