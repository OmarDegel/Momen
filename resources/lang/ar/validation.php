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

    'accepted' => 'يجب قبول حقل :attribute.',
    'accepted_if' => 'يجب قبول حقل :attribute عندما يكون :other هو :value.',
    'active_url' => 'حقل :attribute يجب أن يكون رابط صالح.',
    'after' => 'حقل :attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => 'حقل :attribute يجب أن يحتوي فقط على أحرف.',
    'alpha_dash' => 'حقل :attribute يجب أن يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'حقل :attribute يجب أن يحتوي فقط على أحرف وأرقام.',
    'array' => 'حقل :attribute يجب أن يكون مصفوفة.',
    'ascii' => 'حقل :attribute يجب أن يحتوي فقط على أحرف أبجدية وأرقام بترميز ASCII.',
    'before' => 'حقل :attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => 'حقل :attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',
    'between' => [
        'array' => 'حقل :attribute يجب أن يحتوي على عدد بين :min و :max عنصر.',
        'file' => 'حقل :attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون بين :min و :max.',
        'string' => 'حقل :attribute يجب أن يكون بين :min و :max حرفًا.',
    ],
    'boolean' => 'حقل :attribute يجب أن يكون إما true أو false.',
    'can' => 'حقل :attribute يحتوي على قيمة غير مصرح بها.',
    'confirmed' => 'تأكيد حقل :attribute غير مطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'حقل :attribute يجب أن يكون تاريخًا صحيحًا.',
    'date_equals' => 'حقل :attribute يجب أن يكون تاريخًا يساوي :date.',
    'date_format' => 'حقل :attribute لا يتوافق مع الصيغة :format.',
    'decimal' => 'حقل :attribute يجب أن يحتوي على :decimal أماكن عشرية.',
    'declined' => 'يجب رفض حقل :attribute.',
    'declined_if' => 'يجب رفض حقل :attribute عندما يكون :other هو :value.',
    'different' => 'حقل :attribute يجب أن يكون مختلفًا عن :other.',
    'digits' => 'حقل :attribute يجب أن يكون :digits أرقام.',
    'digits_between' => 'حقل :attribute يجب أن يكون بين :min و :max أرقام.',
    'dimensions' => 'حقل :attribute يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'حقل :attribute يحتوي على قيمة مكررة.',
    'doesnt_end_with' => 'حقل :attribute يجب أن لا ينتهي بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'حقل :attribute يجب أن لا يبدأ بأحد القيم التالية: :values.',
    'email' => 'حقل :attribute يجب أن يكون بريدًا إلكترونيًا صالحًا.',
    'ends_with' => 'حقل :attribute يجب أن ينتهي بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة :attribute غير صالحة.',
    'exists' => 'القيمة المحددة :attribute غير صالحة.',
    'file' => 'حقل :attribute يجب أن يكون ملفًا.',
    'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',
    'gt' => [
        'array' => 'حقل :attribute يجب أن يحتوي على أكثر من :value عنصر.',
        'file' => 'حقل :attribute يجب أن يكون أكبر من :value كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون أكبر من :value.',
        'string' => 'حقل :attribute يجب أن يكون أكبر من :value حرفًا.',
    ],

    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'in_array' => 'حقل :attribute غير موجود في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صالحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صالحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صالحًا.',
    'json' => 'يجب أن يكون حقل :attribute سلسلة JSON صالحة.',
    'lowercase' => 'يجب أن يكون حقل :attribute حروفًا صغيرة.',
    'lt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصرًا.',
        'file' => 'يجب أن يكون حجم حقل :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من :value.',
        'string' => 'يجب أن يكون حقل :attribute أقل من :value حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :value عنصرًا.',
        'file' => 'يجب أن يكون حجم حقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value.',
        'string' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون عنوان MAC صالحًا.',
    'max' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصرًا.',
        'file' => 'يجب ألا يتجاوز حجم حقل :attribute :max كيلوبايت.',
        'numeric' => 'يجب ألا يتجاوز حقل :attribute :max.',
        'string' => 'يجب ألا يتجاوز حقل :attribute :max حرفًا.',
    ],
    'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max رقمًا.',
    'mimes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
    'mimetypes' => 'يجب أن يكون حقل :attribute ملفًا من نوع: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :min عنصرًا على الأقل.',
        'file' => 'يجب أن يكون حجم حقل :attribute :min كيلوبايت على الأقل.',
        'numeric' => 'يجب أن يكون حقل :attribute :min على الأقل.',
        'string' => 'يجب أن يكون حقل :attribute :min حرفًا على الأقل.',
    ],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على :min رقمًا على الأقل.',
    'missing' => 'يجب أن يكون حقل :attribute مفقودًا.',
    'missing_if' => 'يجب أن يكون حقل :attribute مفقودًا عند :other يساوي :value.',
    'missing_unless' => 'يجب أن يكون حقل :attribute مفقودًا ما لم يكن :other يساوي :value.',
    'missing_with' => 'يجب أن يكون حقل :attribute مفقودًا عند وجود :values.',
    'missing_with_all' => 'يجب أن يكون حقل :attribute مفقودًا عند وجود :values.',
    'multiple_of' => 'يجب أن يكون حقل :attribute مضاعفًا لـ :value.',
    'not_in' => 'القيمة المحددة لـ :attribute غير صالحة.',
    'not_regex' => 'تنسيق حقل :attribute غير صالح.',
    'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على الأقل على حرف واحد.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف واحد كبير وحرف واحد صغير على الأقل.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        'uncompromised' => 'تم العثور على :attribute في تسريب بيانات. يرجى اختيار :attribute مختلف.',
    ],
    'present' => 'يجب أن يكون حقل :attribute موجودًا.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور عند :other يس',

    'prohibited_unless' => 'حقل :attribute ممنوع ما لم يكن :other موجودًا في :values.',
    'prohibits' => 'حقل :attribute يمنع وجود :other.',
    'regex' => 'صيغة حقل :attribute غير صالحة.',
    'required' => 'حقل :attribute مطلوب.',
    'required_array_keys' => 'حقل :attribute يجب أن يحتوي على مدخلات لـ :values.',
    'required_if' => 'حقل :attribute مطلوب عندما يكون :other هو :value.',
    'required_if_accepted' => 'حقل :attribute مطلوب عند قبول :other.',
    'required_unless' => 'حقل :attribute مطلوب ما لم يكن :other موجودًا في :values.',
    'required_with' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_with_all' => 'حقل :attribute مطلوب عندما تكون :values موجودة.',
    'required_without' => 'حقل :attribute مطلوب عندما تكون :values غير موجودة.',
    'required_without_all' => 'حقل :attribute مطلوب عندما لا يكون أيًا من :values موجودًا.',
    'same' => 'حقل :attribute يجب أن يكون مطابقًا لـ :other.',
    'size' => [
        'array' => 'حقل :attribute يجب أن يحتوي على :size عناصر.',
        'file' => 'حقل :attribute يجب أن يكون حجمه :size كيلوبايت.',
        'numeric' => 'حقل :attribute يجب أن يكون :size.',
        'string' => 'حقل :attribute يجب أن يكون طوله :size أحرف.',
    ],
    'starts_with' => 'حقل :attribute يجب أن يبدأ بأحد القيم التالية: :values.',
    'string' => 'حقل :attribute يجب أن يكون نصًا.',
    'timezone' => 'حقل :attribute يجب أن يكون منطقة زمنية صالحة.',
    'unique' => 'قيمة حقل :attribute مُستخدمة بالفعل.',
    'uploaded' => 'فشل تحميل ملف الحقل :attribute.',
    'uppercase' => 'حقل :attribute يجب أن يكون بالأحرف الكبيرة.',
    'url' => 'حقل :attribute يجب أن يكون عنوان URL صالح.',
    'ulid' => 'حقل :attribute يجب أن يكون رقم ULID صالح.',
    'uuid' => 'حقل :attribute يجب أن يكون UUID صالح.',
    'required' => 'حقل :attribute مطلوب.',
    'email'    => 'يجب أن يكون :attribute بريدًا إلكترونيًا صالحًا.',
    'url'      => 'يجب أن يكون :attribute رابطًا صالحًا.',
    'max'      => [
        'string' => 'يجب ألا يزيد :attribute عن :max حرفًا.',
    ],

    'ar' => [
        'name' => 'الاسم بالغه العربيه'
    ],
    'en' => [
        'name' => 'الاسم بالغه الانجليزيه'
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
            'required' => 'عنوان الموقع مطلوب.',
        ],
        'site_email' => [
            'required' => 'البريد الإلكتروني مطلوب.',
            'email'    => 'يجب أن يكون البريد الإلكتروني صالحاً.',
        ],
        'site_phone' => [
            'required' => 'رقم الهاتف مطلوب.',
        ],
        'facebook' => [
            'url' => 'يجب أن يكون رابط الفيسبوك صالحاً.',
        ],
        'twitter' => [
            'url' => 'يجب أن يكون رابط تويتر صالحاً.',
        ],
        'instagram' => [
            'url' => 'يجب أن يكون رابط إنستجرام صالحاً.',
        ],
        'linkedin' => [
            'url' => 'يجب أن يكون رابط لينكد إن صالحاً.',
        ],
        'gmail' => [
            'email' => 'يجب أن يكون البريد الإلكتروني لـ Gmail صالحاً.',
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


    // validation message

    'name_required' => 'الاسم مطلوب.',
    'name_string' => 'الاسم يجب أن يكون نصاً.',
    'name_unique' => 'الاسم يجب أن يكون فريدا.',
    'display_name_required' => 'اسم العرض مطلوب.',
    'display_name_string' => 'اسم العرض يجب أن يكون نصاً.',
    'display_name_unique' => 'اسم العرض يجب أن يكون فريدا.',
    'permissions_array' => 'الأذونات يجب أن تكون في شكل قائمة.',
    'permissions_required' => 'يجب تحديد الأذونات.',
    'the_name_required' => 'حقل الاسم مطلوب.',
    'the_name_string' => 'يجب أن يكون الاسم نصًا صحيحًا.',
    'the_phone_required' => 'حقل الهاتف مطلوب.',
    'the_phone_string' => 'يجب أن يكون رقم الهاتف نصًا.',
    'the_phone_unique' => 'رقم الهاتف مسجل بالفعل.',
    'the_phone_regex' => 'يجب أن يكون رقم الهاتف مصري صحيح مكون من 11 رقمًا ويبدأ بـ 01.',
    'the_password_required' => 'حقل كلمة المرور مطلوب.',
    'the_password_confirmed' => 'تأكيد كلمة المرور غير مطابق.',
    'the_password_min' => 'يجب أن تكون كلمة المرور مكونة من 8 أحرف على الأقل.',
    'the_password_max' => 'يجب أن لا تتجاوز كلمة المرور 32 حرفًا.',
    'the_role_id_required' => 'تحديد الدور مطلوب.',
    'the_role_id_exists' => 'الدور المحدد غير موجود.',
    'the_phone_required' => 'رقم الهاتف مطلوب.',
    'the_phone_string' => 'يجب أن يكون رقم الهاتف نصًا.',
    'the_phone_regex' => 'يجب أن يكون رقم الهاتف مصري صحيح مكون من 11 رقمًا ويبدأ بـ 01.',
    'the_phone_unique' => 'رقم الهاتف مسجل بالفعل.',

    'the_name_required' => 'اسم المستخدم مطلوب.',
    'the_name_string' => 'يجب أن يكون الاسم نصًا صحيحًا.',
    'the_name_max' => 'يجب ألا يتجاوز الاسم 50 حرفًا.',

    'the_gender_required' => 'تحديد الجنس مطلوب.',
    'the_gender_in' => 'الجنس المحدد غير صالح.',

    'the_region_id_required' => 'تحديد المنطقة مطلوب.',

    'name_en_required' => 'اسم اللغة الإنجليزية مطلوب.',
    'name_en_string' => 'يجب أن يكون الاسم باللغة الإنجليزية نصًا صحيحًا.',
    'name_en_max' => 'يجب ألا يتجاوز الاسم باللغة الإنجليزية 50 حرفًا.',
    'name_en_regex' => 'يجب أن يحتوي الاسم باللغة الإنجليزية على أحرف إنجليزية فقط.',
    'name_en_unique' => 'اسم اللغة الإنجليزية مستخدم بالفعل.',

    'name_ar_required' => 'اسم اللغة العربية مطلوب.',
    'name_ar_string' => 'يجب أن يكون الاسم باللغة العربية نصًا صحيحًا.',
    'name_ar_max' => 'يجب ألا يتجاوز الاسم باللغة العربية 50 حرفًا.',
    'name_ar_regex' => 'يجب أن يحتوي الاسم باللغة العربية على أحرف عربية فقط.',
    'name_ar_unique' => 'اسم اللغة العربية مستخدم بالفعل.',


    'description_en_nullable' => 'الوصف باللغة الإنجليزية يمكن أن يكون فارغًا.',
    'description_en_required' => 'الوصف باللغة الإنجليزية مطلوب.',
    'description_en_string' => 'يجب أن يكون الوصف باللغة الإنجليزية نصًا صحيحًا.',
    'description_en_max' => 'يجب ألا يتجاوز الوصف باللغة الإنجليزية 250 حرفًا.',
    'description_en_regex' => '.يجب أن يحتوي الوصف باللغة الإنجليزية على أحرف إنجليزية فقط',

    'description_ar_required' => 'الوصف باللغة العربية مطلوب.',
    'description_ar_nullable' => 'الوصف باللغة العربية يمكن أن يكون فارغًا.',
    'description_ar_string' => 'يجب أن يكون الوصف باللغة العربية نصًا صحيحًا.',
    'description_ar_max' => 'يجب ألا يتجاوز الوصف باللغة العربية 250 حرفًا.',
    'description_ar_regex' => 'يجب أن يحتوي الوصف باللغة العربية على أحرف عربية فقط.',

    'active_required' => 'حالة التفعيل مطلوبة.',

    'name_en_required' => 'اسم اللغة الإنجليزية مطلوب.',
    'name_en_string' => 'يجب أن يكون الاسم باللغة الإنجليزية نصًا صحيحًا.',
    'name_en_max' => 'يجب ألا يتجاوز الاسم باللغة الإنجليزية 50 حرفًا.',
    'name_en_regex' => 'يجب أن يحتوي الاسم باللغة الإنجليزية على أحرف إنجليزية فقط.',

    'name_ar_required' => 'اسم اللغة العربية مطلوب.',
    'name_ar_string' => 'يجب أن يكون الاسم باللغة العربية نصًا صحيحًا.',
    'name_ar_max' => 'يجب ألا يتجاوز الاسم باللغة العربية 50 حرفًا.',
    'name_ar_regex' => 'يجب أن يحتوي الاسم باللغة العربية على أحرف عربية فقط.',

    'description_en_nullable' => 'الوصف باللغة الإنجليزية يمكن أن يكون فارغًا.',
    'description_en_string' => 'يجب أن يكون الوصف باللغة الإنجليزية نصًا صحيحًا.',
    'description_en_max' => 'يجب ألا يتجاوز الوصف باللغة الإنجليزية 250 حرفًا.',
    'description_en_regex' => 'يجب أن يحتوي الوصف باللغة الإنجليزية على أحرف إنجليزية فقط.',

    'description_ar_nullable' => 'الوصف باللغة العربية يمكن أن يكون فارغًا.',
    'description_ar_string' => 'يجب أن يكون الوصف باللغة العربية نصًا صحيحًا.',
    'description_ar_max' => 'يجب ألا يتجاوز الوصف باللغة العربية 250 حرفًا.',
    'description_ar_regex' => 'يجب أن يحتوي الوصف باللغة العربية على أحرف عربية فقط.',

    'category_id_required' => 'تحديد التصنيف مطلوب.',
    'category_id_exists' => 'التصنيف المحدد غير موجود.',
    'unit_price' => 'سعر الوحده',


    'name_required' => 'اسم الحقل مطلوب.',
    'name_string' => 'يجب أن يكون الاسم نصًا.',

    'phone_regex' => 'رقم الهاتف غير صحيح.',
    'phone_unique' => 'رقم الهاتف موجود بالفعل.',

    'password_confirmed' => 'تأكيد كلمة المرور غير متطابق.',
    'password_min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',

    'title_ar_required' => 'العنوان باللغة العربية مطلوب.',
    'title_ar_string' => 'يجب أن يكون العنوان باللغة العربية نصًا.',
    'title_ar_regex' => 'تنسيق العنوان باللغة العربية غير صحيح.',

    'title_en_required' => 'العنوان باللغة الإنجليزية مطلوب.',
    'title_en_string' => 'يجب أن يكون العنوان باللغة الإنجليزية نصًا.',
    'title_en_regex' => 'تنسيق العنوان باللغة الإنجليزية غير صحيح.',

    'description_ar_nullable' => 'الوصف باللغة العربية اختياري.',
    'description_ar_string' => 'يجب أن يكون الوصف باللغة العربية نصًا.',
    'description_ar_min' => 'يجب أن يحتوي الوصف باللغة العربية على 10 أحرف على الأقل.',
    'description_ar_max' => 'يجب ألا يزيد الوصف باللغة العربية عن 500 حرف.',

    'description_en_nullable' => 'الوصف باللغة الإنجليزية اختياري.',
    'description_en_string' => 'يجب أن يكون الوصف باللغة الإنجليزية نصًا.',
    'description_en_min' => 'يجب أن يحتوي الوصف باللغة الإنجليزية على 10 أحرف على الأقل.',
    'description_en_max' => 'يجب ألا يزيد الوصف باللغة الإنجليزية عن 500 حرف.',

    'priority_in' => 'الأولوية يجب أن تكون إحدى القيم المحددة.',
    'repeating_in' => 'التكرار يجب أن يكون إحدى القيم المحددة.',

    'region_id_required' => 'منطقة مطلوبة.',
    'region_id_exists' => 'المنطقة غير موجودة.',

    'volunteer_id_required' => 'معرف المتطوع مطلوب.',
    'volunteer_id_exists' => 'المتطوع غير موجود.',

    'category_case_id_required' => 'معرف فئة الحالة مطلوب.',
    'category_case_id_exists' => 'فئة الحالة غير موجودة.',

    'items_required_without' => 'يجب إدخال العناصر في حالة عدم وجود عناصر.',
    'items_item_id_required_without' => 'معرف العنصر مطلوب في حالة عدم وجود عناصر.',
    'items_item_id_exists' => 'معرف العنصر غير موجود.',
    'items_amount_required_without' => 'المبلغ مطلوب في حالة عدم وجود عناصر.',
    'items_amount_numeric' => 'يجب أن يكون المبلغ رقماً.',
    'items_amount_min' => 'يجب أن يكون المبلغ على الأقل 1.',

    'price_required_without' => 'السعر مطلوب في حالة عدم وجود عناصر.',
    'price_numeric' => 'يجب أن يكون السعر رقماً.',
    'price_min' => 'يجب أن يكون السعر على الأقل 0.',

    'images_image' => 'يجب أن تكون الصورة صحيحة.',
    'images_mimes' => 'امتداد الصورة غير صحيح.',
    'images_max' => 'يجب ألا تتجاوز حجم الصورة 2 ميجابايت.',
    'you_cant_enter_both_price_and_items' => 'لا يمكنك ادخال السعر والاغراض في نفس الوقت',
    'amount_need_numeric' => 'يجب ان يكون المبلغ المطلوب رقم',
    'amount_need_min' => 'يجب ان يكون المبلغ المطلوب اكبر من صفر',
    'password_min' => 'كلمة المرور يجب ان تكون 8 احرف علي الاقل',
    'password_max' => 'كلمة المرور يجب ان لا تتجاوز 32 حرف',
    'password_regex' => 'كلمة المرور يجب ان تحتوي علي حرف كبير وحرف صغير ورقم ورمز',
    'password_confirmed' => 'كلمة المرور وتاكيد كلمة المرور يجب ان يكونو متطابقين',
    'email_unique' => 'البريد الالكتروني مسجل بالفعل',
    'email_required' => 'البريد الالكتروني مطلوب',
    'email_email' => 'البريد الالكتروني غير صحيح',
    'phone_required' => 'رقم الهاتف مطلوب',
    'phone_unique' => 'رقم الهاتف مسجل بالفعل',
    'phone_regex' => 'رقم الهاتف غير صحيح',
    'name_ar_required' => 'الاسم بالعربية مطلوب',
    'name_ar_max' => 'الاسم بالعربية يجب ان لا يتجاوز 255 حرف',
    'name_ar_regex' => 'الاسم بالعربية يجب ان يحتوي علي حروف عربيه فقط',
    'name_en_required' => 'الاسم بالانجليزية مطلوب',
    'name_en_max' => 'الاسم بالانجليزية يجب ان لا يتجاوز 255 حرف',
    'name_en_regex' => 'الاسم بالانجليزية يجب ان يحتوي علي حروف انجليزية فقط',
    'city_id_required' => 'المدينة مطلوبة',
    'city_id_exists' => 'المدينة غير موجودة',
    'region_id_required' => 'المنطقة مطلوبة',
    'region_id_exists' => 'المنطقة غير موجودة',
    'amount_numeric' => 'الكمية يجب ان تكون رقم',
    'amount_min' => 'الكمية يجب ان تكون اكبر من صفر',
    'image_required' => 'الصورة مطلوبة.',
    'image_image' => 'يجب أن تكون الصورة ملف صورة.',
    'image_mimes' => 'يجب أن تكون الصورة من نوع: :values.',
    'image_max' => 'يجب ألا يتجاوز حجم الصورة :max كيلوبايت.',
    'image_dimensions' => 'أبعاد الصورة غير صالحة.',
    'name_ar_max' => 'الاسم باللغة العربية يجب ألا يتجاوز 255 حرفًا.',
    'name_en_max' => 'الاسم باللغة الإنجليزية يجب ألا يتجاوز 255 حرفًا.',
    'description_ar_max' => 'الوصف باللغة العربية يجب ألا يتجاوز 500 حرفًا.',
    'description_en_max' => 'الوصف باللغة الإنجليزية يجب ألا يتجاوز 500 حرفًا.',
    'address_string' => 'يجب أن يكون العنوان نصًا.',
    'address_max' => 'يجب ألا يتجاوز العنوان 1000 حرف.',
    'store_type_id_exists' => 'نوع المتجر المحدد غير موجود.',
    'store_type_id_required' => 'نوع المتجر مطلوب.',
    'order_id_integer' => 'معرف الطلب يجب أن يكون رقمًا صحيحًا.',
    'order_id_min' => 'معرف الطلب يجب أن يكون على الأقل 0.',
    'order_id_max' => 'معرف الطلب يجب أن لا يتجاوز 9999999999999999',
    'address_required' => 'العنوان مطلوب.',
    "order_id_required" => "رقم العرض مطلوب",

    "city_id_required" => "المدينة مطلوبة",
    "shipping_required" => "الشحن مطلوب",
    "shipping_numeric" => "الشحن يجب ان يكون رقم",
    "one_of_this_fields_required" => "احد الحقول مطلوبة (اللينك , المنتج)",
    'you_must_select_an_offer' => 'يجب تحديد نوع واحد من العرض: نسبة أو مبلغ أو سعر نهائي.',
    'you_must_select_one_offer' => 'يجب تحديد نوع واحد من العرض: نسبة او مبلغ او سعر نهائي.',
    'shipping_cost_must_be_zero' => 'يجب ان يكون سعر الشحن صفر عند اختيار خدمة الشحن المجانية.',
    'shipping_cost_required' => 'سعر الشحن مطلوب',
    'order_max_smaller_than_amount' => 'الحد الاقصى للطلب يجب ان يكون اقل من الكمية',
    'invalid_category_for_service' => 'القسم غير صحيح لهذا الخدمة',
    'offer_price_bigger_than_price' => 'سعر العرض يجب ان يكون اكبر من سعر المنتج',
    'offer_percent_smaller_than_price' => 'قيمة الخصم الثابت  يجب أن تكون أقل من سعر المنتج',

    'duplicate_child_size' => 'لا يمكن تكرار نفس المقاس في المتغيرات.',

    'child_amount_gt_max_order' => 'الكمية في المنتج الفرعي رقم :child يجب أن تكون أكبر من الحد الأقصى للطلب وهو :max_order.',

    'offer_required_one' => 'يجب اختيار نوع عرض واحد على الأقل',
    'offer_required_only_one' => 'يجب اختيار نوع عرض واحد فقط',
    'amount_less_than_max' => 'يجب أن تكون كمية المنتج الفرعي أكبر من الحد الأعلى للطلب',
    'offer_price_must_be_greater_than' => 'سعر العرض يجب أن يكون أكبر من السعر العادي',
    'duplicate_size' => 'الحجم مستخدم من قبل، اختر حجم مختلف',
    'check_form_before_submit' => '⚠️ تأكد من إدخال البيانات بشكل صحيح قبل الحفظ',

    "product_id_required" => "معرف المنتج مطلوب",
    "product_id_exists" => "معرف المنتج غير موجود",
    "user_id_required" => "معرف المستخدم مطلوب",
    "user_id_exists" => "معرف المستخدم غير موجود",
    "rate_required" => "التقييم مطلوب",
    "rate_integer" => "يجب أن يكون التقييم عددًا صحيحًا",
    "rate_min" => "يجب أن يكون التقييم على الأقل 1",
    "rate_max" => "يجب أن يكون التقييم على الأكثر 5",
    "comment_required" => "التعليق مطلوب",
    "comment_string" => "يجب أن يكون التعليق نصًا",
    "active_required" => "الحالة مطلوبة",
    "active_boolean" => "يجب أن تكون الحالة منطقية",

];
