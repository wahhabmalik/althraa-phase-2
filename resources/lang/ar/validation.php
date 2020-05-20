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

    'accepted' => 'ال      :attribute     يجب أن تكون مقبولة.',
    'active_url' => 'ال      :attribute     ليس عنوان URL صالحًا.',
    'after' => 'ال      :attribute     يجب أن يكون تاريخ بعد   :date.',
    'after_or_equal' => 'ال      :attribute     يجب أن يكون تاريخ بعد أو يساوي   :date.',
    'alpha' => 'ال      :attribute     قد تحتوي فقط على رسائل.',
    'alpha_dash' => 'ال      :attribute     قد يحتوي فقط على أحرف وأرقام وشرطات وشرطات سفلية.',
    'alpha_num' => 'ال      :attribute     قد تحتوي فقط على حروف وأرقام.',
    'array' => 'ال      :attribute     يجب أن يكون مجموعة.',
    'before' => 'ال      :attribute     يجب أن يكون تاريخ من قبل   :date.',
    'before_or_equal' => 'ال      :attribute     يجب أن يكون تاريخ قبل أو يساوي   :date.',
    'between' => [
        'numeric' => 'ال      :attribute     يجب ان يكون وسطا   :min و  :max.',
        'file' => 'ال      :attribute     يجب ان يكون وسطا   :min و  :max كيلو بايت.',
        'string' => 'ال      :attribute     يجب ان يكون وسطا   :min و  :max الشخصيات.',
        'array' => 'ال      :attribute     يجب أن يكون بين   :min و  :max العناصر.',
    ],
    'boolean' => 'ال      :attribute     يجب أن يكون الحقل صواب أو خطأ.',
    'confirmed' => 'ال      :attribute     التأكيد غير متطابق.',
    'date' => 'ال      :attribute     هذا ليس تاريخ صحيح.',
    'date_equals' => 'ال      :attribute     يجب أن يكون تاريخ يساوي :date.',
    'date_format' => 'ال      :attribute     لا يطابق التنسيق   :format.',
    'different' => 'ال      :attribute     و  :other يجب أن تكون مختلفة.',
    'digits' => 'ال      :attribute     يجب أن تكون   :digits الأرقام.',
    'digits_between' => 'ال      :attribute     يجب ان يكون وسطا   :min و  :max الأرقام.',
    'dimensions' => 'ال      :attribute     له أبعاد صورة غير صالحة.',
    'distinct' => 'ال      :attribute     الحقل له قيمة مكررة
.',
    'email' => 'ال      :attribute     يجب أن يكون عنوان بريد إلكتروني صالح.',
    'ends_with' => 'ال      :attribute     يجب أن ينتهي بواحد مما يلي: :values',
    'exists' => 'ال      selected :    السمة غير صالحة.',
    'file' => 'ال      :attribute     يجب أن يكون ملف.',
    'filled' => 'ال      :attribute     يجب أن يكون الحقل قيمة
.',
    'gt' => [
        'numeric' => 'ال      :attribute     يجب أن يكون أكبر من   :value.',
        'file' => 'ال      :attribute     يجب أن يكون أكبر من   :value كيلو بايت.',
        'string' => 'ال      :attribute     يجب أن يكون أكبر من   :value الشخصيات.',
        'array' => 'ال      :attribute     يجب أن يكون أكثر من   :value العناصر.',
    ],
    'gte' => [
        'numeric' => 'ال      :attribute     يجب أن يكون أكبر من أو يساوي   :value.',
        'file' => 'ال      :attribute     يجب أن يكون أكبر من أو يساوي   :value كيلو بايت.',
        'string' => 'ال      :attribute     يجب أن يكون أكبر من أو يساوي   :value الشخصيات.',
        'array' => 'ال      :attribute     يجب ان يملك   :value العناصر or أكثر.',
    ],
    'image' => 'ال      :attribute     يجب أن تكون صورة.',
    'in' => 'ال      selected :    السمة غير صالحة.',
    'in_array' => 'ال      :attribute     الحقل غير موجود في   :other.',
    'integer' => 'ال      :attribute     يجب أن يكون صحيحا.',
    'ip' => 'ال      :attribute     يجب أن يكون عنوان IP صالحًا.',
    'ipv4' => 'ال      :attribute     يجب أن يكون عنوان IPv4 صالحًا.',
    'ipv6' => 'ال      :attribute     يجب أن يكون عنوان IPv6 صالحًا.',
    'json' => 'ال      :attribute     يجب أن تكون سلسلة JSON صالحة.',
    'lt' => [
        'numeric' => 'ال      :attribute     يجب أن يكون أقل من   :value.',
        'file' => 'ال      :attribute     يجب أن يكون أقل من   :value كيلو بايت.',
        'string' => 'ال      :attribute     يجب أن يكون أقل من   :value الشخصيات.',
        'array' => 'ال      :attribute     يجب أن يكون أقل من   :value العناصر.',
    ],
    'lte' => [
        'numeric' => 'ال      :attribute     يجب أن يكون أقل من أو يساوي   :value.',
        'file' => 'ال      :attribute     يجب أن يكون أقل من أو يساوي   :value كيلو بايت.',
        'string' => 'ال      :attribute     يجب أن يكون أقل من أو يساوي   :value الشخصيات.',
        'array' => 'ال      :attribute     يجب ألا يكون أكثر من   :value العناصر.',
    ],
    'max' => [
        'numeric' => 'ال      :attribute     قد لا يكون أكبر من   :max.',
        'file' => 'ال      :attribute     قد لا يكون أكبر من   :max كيلو بايت.',
        'string' => 'ال      :attribute     قد لا يكون أكبر من   :max الشخصيات.',
        'array' => 'ال      :attribute     قد لا يكون أكثر من   :max العناصر.',
    ],
    'mimes' => 'ال      :attribute     يجب أن يكون ملف من النوع : :values.',
    'mimetypes' => 'ال      :attribute     يجب أن يكون ملف من النوع : :values.',
    'min' => [
        'numeric' => 'ال      :attribute     لا بد أن يكون على الأقل   :min.',
        'file' => 'ال      :attribute     لا بد أن يكون على الأقل   :min كيلو بايت.',
        'string' => 'ال      :attribute     لا بد أن يكون على الأقل   :min الشخصيات.',
        'array' => 'ال      :attribute     يجب أن يكون على الأقل   :min العناصر.',
    ],
    'not_in' => 'ال      selected :    السمة غير صالحة.',
    'not_regex' => 'ال      :attribute     التنسيق غير صالح.',
    'numeric' => 'ال      :attribute     يجب أن يكون رقما.',
    'present' => 'ال      :attribute     يجب أن يكون الحقل حاضرا.',
    'regex' => 'ال      :attribute     التنسيق غير صالح.',
    'require' => 'ال   التنسيق مطلوب',
    'required' => 'ال      :attribute التنسيق مطلوب',
    'required_if' => 'ال      :attribute     حقل مطلوب عندما  :other يكون   :value.',
    'required_unless' => 'ال      :attribute     الحقل مطلوب ما لم   :other في داخل   :values.',
    'required_with' => 'ال      :attribute     حقل مطلوب عندما   :values حاضر.',
    'required_with_all' => 'ال      :attribute     حقل مطلوب عندما   :values حاضرون.',
    'required_without' => 'ال      :attribute     حقل مطلوب عندما   :values غير موجود.',
    'required_without_all' => 'ال      :attribute     حقل مطلوب عندما لا شيء من :values حاضرون.',
    'same' => 'ال      :attribute     و  :other يجب أن تطابق.',
    'size' => [
        'numeric' => 'ال      :attribute     لا بد وأن   :size.',
        'file' => 'ال      :attribute     لا بد وأن   :size كيلو بايت.',
        'string' => 'ال      :attribute     لا بد وأن   :size الشخصيات.',
        'array' => 'ال      :attribute     يجب أن يحتوي على   :size العناصر.',
    ],
    'starts_with' => 'ال      :attribute     يجب أن يبدأ بأحد الإجراءات التالية: :values',
    'string' => 'ال      :attribute     يجب أن يكون سلسلة.',
    'timezone' => 'ال      :attribute     يجب أن تكون منطقة صالحة
.',
    'unique' => 'ال      :attribute    لقد اتخذت بالفعل.',
    'uploaded' => 'ال      :attribute     فشل في التحميل.',
    'url' => 'ال      :attribute     التنسيق غير صالح.',
    'uuid' => 'ال      :attribute     يجب أن يكون UUID صالح.',

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
        'attribute-name' => [
            'rule-name' => 'custom-message',
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

    'attributes' => [
        'name' => 'اسم',
        'email' => 'البريد الإلكتروني',
    ],

];
