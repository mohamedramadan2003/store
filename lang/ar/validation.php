<?php

return [

    'accepted' => 'يجب الموافقة على :attribute.',
    'accepted_if' => 'يجب الموافقة على :attribute عندما يكون :other هو :value.',
    'active_url' => ':attribute يجب أن يكون رابطًا صحيحًا.',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date.',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date.',
    'alpha' => ':attribute يجب أن يحتوي على حروف فقط.',
    'alpha_dash' => ':attribute يجب أن يحتوي على حروف، أرقام، شرطات، وشرطات سفلية فقط.',
    'alpha_num' => ':attribute يجب أن يحتوي على حروف وأرقام فقط.',
    'array' => ':attribute يجب أن يكون مصفوفة.',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date.',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date.',

    'between' => [
        'numeric' => ':attribute يجب أن تكون قيمته بين :min و :max.',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت.',
        'string' => ':attribute يجب أن يكون بين :min و :max حرفًا.',
        'array' => ':attribute يجب أن يحتوي على عدد عناصر بين :min و :max.',
    ],

    'boolean' => ':attribute يجب أن يكون صحيحًا أو خطأ.',
    'confirmed' => 'تأكيد :attribute غير متطابق.',
    'date' => ':attribute يجب أن يكون تاريخًا صحيحًا.',
    'date_format' => ':attribute لا يطابق التنسيق :format.',
    'different' => ':attribute و :other يجب أن يكونا مختلفين.',
    'digits' => ':attribute يجب أن يكون مكونًا من :digits رقمًا.',
    'digits_between' => ':attribute يجب أن يكون بين :min و :max رقمًا.',
    'email' => ':attribute يجب أن يكون بريدًا إلكترونيًا صالحًا.',
    'exists' => ':attribute المحدد غير موجود.',
    'file' => ':attribute يجب أن يكون ملفًا.',
    'filled' => 'حقل :attribute يجب أن يحتوي على قيمة.',

    'gt' => [
        'numeric' => ':attribute يجب أن تكون قيمته أكبر من :value.',
        'file' => ':attribute يجب أن يكون حجمه أكبر من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أطول من :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على أكثر من :value عنصر.',
    ],

    'gte' => [
        'numeric' => ':attribute يجب أن تكون قيمته أكبر من أو تساوي :value.',
        'file' => ':attribute يجب أن يكون حجمه على الأقل :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون طوله على الأقل :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على :value عنصر أو أكثر.',
    ],

    'image' => ':attribute يجب أن يكون صورة.',
    'in' => ':attribute المختار غير صالح.',
    'integer' => ':attribute يجب أن يكون عددًا صحيحًا.',
    'ip' => ':attribute يجب أن يكون عنوان IP صحيحًا.',
    'ipv4' => ':attribute يجب أن يكون عنوان IPv4 صحيحًا.',
    'ipv6' => ':attribute يجب أن يكون عنوان IPv6 صحيحًا.',
    'json' => ':attribute يجب أن يكون نص JSON صحيح.',

    'lt' => [
        'numeric' => ':attribute يجب أن تكون قيمته أقل من :value.',
        'file' => ':attribute يجب أن يكون حجمه أقل من :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون أقصر من :value حرفًا.',
        'array' => ':attribute يجب أن يحتوي على أقل من :value عنصر.',
    ],

    'lte' => [
        'numeric' => ':attribute يجب أن تكون قيمته أقل من أو تساوي :value.',
        'file' => ':attribute يجب أن يكون حجمه على الأكثر :value كيلوبايت.',
        'string' => ':attribute يجب أن يكون طوله على الأكثر :value حرفًا.',
        'array' => ':attribute لا يجب أن يحتوي على أكثر من :value عنصر.',
    ],

    'max' => [
        'numeric' => ':attribute لا يجب أن يكون أكبر من :max.',
        'file' => ':attribute لا يجب أن يكون أكبر من :max كيلوبايت.',
        'string' => ':attribute لا يجب أن يكون أطول من :max حرفًا.',
        'array' => ':attribute لا يجب أن يحتوي على أكثر من :max عنصر.',
    ],

    'min' => [
        'numeric' => ':attribute يجب أن يكون على الأقل :min.',
        'file' => ':attribute يجب أن يكون على الأقل :min كيلوبايت.',
        'string' => ':attribute يجب أن يكون على الأقل :min حرفًا.',
        'array' => ':attribute يجب أن يحتوي على الأقل :min عنصر.',
    ],

    'not_in' => ':attribute المختار غير صالح.',
    'numeric' => ':attribute يجب أن يكون رقمًا.',
    'required' => 'حقل :attribute مطلوب.',
    'same' => ':attribute و :other يجب أن يتطابقا.',
    'size' => [
        'numeric' => ':attribute يجب أن يكون :size.',
        'file' => ':attribute يجب أن يكون :size كيلوبايت.',
        'string' => ':attribute يجب أن يكون :size حرفًا.',
        'array' => ':attribute يجب أن يحتوي على :size عنصر.',
    ],

    'string' => ':attribute يجب أن يكون نصًا.',
    'timezone' => ':attribute يجب أن يكون منطقة زمنية صحيحة.',
    'unique' => 'قيمة :attribute مستخدمة من قبل.',
    'uploaded' => 'فشل في رفع :attribute.',
    'url' => ':attribute يجب أن يكون رابطًا صحيحًا.',

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'رسالة مخصصة',
        ],
    ],

    'attributes' => [],

];
