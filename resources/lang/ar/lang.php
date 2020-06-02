<?php
/**
 * All translation constants
 *
 */
return [
    'english' => '',
    'arabic' => ' عربى     ',
    'language' => 'EN',
    'home' => 'الصفحة الرئيسية',
    'login' => 'تسجيل الدخول',
    'register' => 'تسجيل',
    'logout' => 'تسجيل خروج',
    'registration' => 'التسجيل ',
    'get_started' => '   إبدأ الآن   ',
    'control_panel' => '   لوحة التحكم   ',

    'select_gender' => 'حدد نوع الجنس',
    'male' => 'الذكر',
    'female' => 'أنثى',
    'other' => 'آخر',
    'search' => '   بحث   ',

    'email_address' => 'عنوان بريد الكتروني',
    'password' => 'كلمه السر',
    'required_field' => 'هذه الخانة مطلوبه',
    'valid_email' => 'رجاء قم بإدخال بريد الكتروني صحيح',

    'login_form' => [
        'forgot_your_passowrd' => 'نسيت رقمك السري ؟',
        'dont_have_account' => 'نليس لديك حساب ؟  ',
        'already_have_account' => 'هل لديك حساب ؟ ',
        'login_with_google' => 'تسجيل الدخول عبر جوجل ',
        'or' => 'أو ', 
    	'login_with_another_account' => '  تسجيل الدخول بحساب آخر  ', 
    ],

    'register_form' => [
    	'name' => 'اسم',
        'gender' => '  جنس      ',
        'phone_number' => '  رقم الهاتف         ',
    	'confirm_password' => 'تأكيد كلمة المرور',  
        'type_your_password_here' => 'اكتب كلمة مرورك هنا ',
        'type_your_email_here' => 'اكتب بريدك الالكتروني هنا ',
        'register_with_google' => '',

        'agree_to' => '   قبلت أن            ',
        'term_and_conditions' => '   الأحكام والشروط          ',
        'role' => 'الرتبه'
    ],

    'reset_password_form' => [
    	'reset_password' => 'إعادة تعيين كلمة المرور',
    	'send_password_reset_link' => 'إرسال رابط إعادة تعيين كلمة المرور',    	
    ],


    'help_text' => [
        'phone_number_hint' => '    تأكد من إدخال رقم هاتفك بدءًا من الرمز الدولي. أي؛ 96 ، 92 ، ... إلخ
             ',
    ],


    'dashboard' => [
        'dashboard' => 'لوحة القيادة',
        'you_are_logged_in' => 'لقد سجلت الدخول !',
    ],

    'site_management' => [
        'site_management' => 'إدارة الموقع',
    ],

    'code_will_expire_in' => 'رمز التحقق سوف ينتهي خلال',
    'minutes' => 'دقائق',
    'seconds' => 'ثواني',
    'code_expired' => 'رمز التحقق منتهي الصلاحية',


    'question' => [
        'go_to_previous_step' => '  انتقل إلى الخطوة السابقة      ',

        'total' => '  الاجمالي  ',
        'net_total' => '  المجموع الصافي    ',

        // step 1
        'started_year_for_personal_financial_plan' => '   السنة الميلادية للخطة المالية الشخصية      ',
        'name' => '  الاسم    ',
        'education_level' => 'اختيار المستوى التعليمي',
        'years_old' => '   العمر     ',
        'education_level' => 'المستوى التعليمي',
        'retirement_age' => 'سن التقاعد',
        'no_of_dependents' => '  عدد المعالين    ',
        'current_age' => ' العمر حالياً ',


            'education_level_options' => [
                'highschool' => 'High School & Bleow',
                'bachlore' => 'Bachlore',
                'master' => 'Master',
                'above' => 'Above',
            ],

        'continue_to_income' => '   الاستمرار في الدخل      ',

        // step 2
        'salary' => '  راتب   ',
        'private_business_or_freelancing' => '   خارج العمل     ',
        'other' => ' Other ',
        'stock_dividents' => '    توزيعات اسهم     ',
        'pension_income' => '   دخل تقاعدي     ',
        'real_estate_income_rent' => '  اجار عقار      ',
        'other' => '  آخر ',

        // 'continue_to_expenses' => '  الاستمرار في          المصاريف            ',
        'continue_to_saving_plan' => ' الاستمرار الى خطة المدخرات  ',


        // step 3
        'current_saving_balance' => ' رصيد مدخراتي حتي اليوم',
        'gosi_or_ppa_monthly_subscription' => 'الاستقطاع الشهري ( التأمينات الاجتماعية / التقاعد ) ',
        'monthly_saving_plan_for_retirement' => 'الادخار الشهري للخطة المالية الشخصية ',
        'annual_increase_in_saving_plan' => ' (%)  معدل الزيادة في الادخار بشكل سنوي',

        'continue_to_worth' => 'الاستمرار الى الثروة الشخصية',


        // step 3 -> old 
        'house' => '   المسكن      ',
        // -------------------
        'rent_or_mortgage' => '  ايجار او قرض منزل    ',
        'insurance' => '   تامين سكن         ',
        'utilities' => '    فواتير الكهرباء والماء        ',
        'maintenance' => '   صيانة         ',

        'car' => '  السيارة      ',
        // ---------------------
        'gas_&_oil' => '   بنزين وزيت     ',
        'car_maintenance' => '   الصيانة الدورية      ',
        'car_insurance' => '  تامين السيارة      ',
        'car_payment' => '   قسط السيارة       ',

        'pocket_money' => ' مصاريف شخصية       ',
        // ------------------------
        'food' => '    اكل     ',
        'clothes' => '   ملابس     ',
        'phone_bills' => '   اتصالات ونت         ',

        'health_&_education' => '   صحة وتعليم      ',
        // ------------------------
        'medical_insurance' => '   تامين صحي          ',
        'medical_treatement' => '   تامين صحي          ',
        'medicine' => '   علاج          ',
        'health_accessories' => '  ادوية        ',
        'schooling' => '   رسوم مدارس       ',
        'gym' => '   اشتراك نادي       ',

        'investments' => '   استثمار     ',
        // ------------------------
        'life_insurance' => '  تامين حياة     ',
        'retirement_plan_gosi' => '   تامينات اجتماعية/ تقاعد      ',
        // 'personal_financial_plan' => '   التطوير الشخصي     ',

        'investment_plan_payment' => 'دفع خطة الاستثمار',
        'saving_plan_payment' => 'توفير خطة الدفع',

        
        'personal_development_&_educations' => '   استقطاع  استثماري       استقطاع ادخاري     ',

        'loans' => '   قرض      ',
        // ------------------------
        'personal_loan' => '   قرض شخصي      ',
        'credit_cards' => '   بطاقة ائتمانية       ',

        'entertaining' => '  ترفية     ',
        // ------------------------
        'vacations' => '  إجازة      ',
        'others' => '   أخرى       ',

        'charity_&_taxes' => '   صدقة وضريبة     ',
        // ------------------------
        'charity' => '  صدقة      ',
        'zakat' => '   الزكاه      ',
        'taxes_&_gov_fees' => '    الضريبة والرسوم       ',

        // --------------------
        'total' => '   الاجمالي     ',

        'continue_to_net_assets' => '   الاستمرار في صافي الأصول       ',


        // step 4
        'assets' => '   استثمارات       ',
            'real_estate' => 'عقارات',
            'pe' => 'مشاريع (ملكيات خاصة)',

        'financial_assets' => 'الاصول المالية',
            'cash_and_deposit' => 'النقد وما يعادله',
            'equities' => 'أسهم',
            'bonds' => 'صكوك وسندات ',

        'liquid_assets' => '  استثمارات سائلة     ',

        'liquid_cash' => '   نقد      ',
        'liquid_time_deposits' => '  ودائع    ',
        'liquid_local_equity' => '   اسهم محلية     ',
        'liquid_government_bonds' => '    سندات حكومية    ',
        'liquid_international_equity' => '   سندات و صكوك شركات     ',
        'liquid_corporate_bonds' => '  اسهم دولية      ',

        'unliquid_assets' => '   إستثمارات غير سائلة     ',

        'unliquid_REITS' => '  وحدات عقارية متداولة ريت     ',
        'unliquid_direct_properties' => '  عقارات مباشرة       ',
        'unliquid_properties_shared_owned' => 'ممتلاكات مشتركة ',
        'unliquid_international_properties_shared_owned' => 'العقارات الدولية المشتركة المملوكة',
        'unliquid_international_properties_direct_owned' => 'العقارات الدولية المملوكة مباشرة',
        'unliquid_priavte_business' => '    عمل خاص      ',
        'unliquid_others' => '   الآخرين     ',

        'personal_assets' => '   ممتلكات شخصية      ',

        'personal_vehicles' => '   مركبات    ',
        'personal_jeweleries' => '  مجوهرات    ',
        'personal_private_house' => '  السكن الشخصي     ',
        'personal_art_&_boutique' => '   مقتنيات ثمينة وهوايات      ',

        'liabilities' => '    قروض          ',
            'liabilities_real_estate_loan' => ' liabilities real estate loan  ',
            'real_estate_loan' => 'قرض عقاري',


        'liabilities_personal_loan' => '   قرض شخصي     ',
        'liabilities_mortgage' => '  قرض عقاري      ',
        'liabilities_credit_cards' => '  البطاقة الائتمانية     ',
        'liabilities_free_loan' => '   سلف     ',

        // 
        'next' => '  التالى      ',
        'previous' => '  سابق      ',
        'go_to' => '  انتقل إلى    ',

        'continue_to_gosi' => '  الاستمرار في     GOSI      ',


        // step 5
        'gosi_starting_year_in_plan' => '   السنة الملادية  لبدء الاشتراك    ',
        'gosi_average_of_last_24_months_salary' => '   متوسط الراتب اخر 24 شهر       ',
        'gosi_subscriptions_months' => '   مدة الاشتراك بالاشهر      ',
        'expecting_salary_at_retirement' => 'الراتب المتوقع عند التقاعد',
        'mothly_life_expenses_after_retirement' => 'Mothly life expenses after retirement',

        'continue_to_risk' => '   الاستمرار في المخاطر     ',


        // step 6

        // q1
        'risk_age' => '      اﻟﻌﻤﺮ              ',

        'less_than_31' => '   اقل من 31 سنة         ',
        '31_40' => '31 – 40',
        '41_50' => '41 – 50',
        '51_60' => '51 – 60',
        'more_than_60' => '    اكثر من 60 سنة           ',

        // q2
        'my_total_saving_and_investment_amount' => '     نسبة مجموع مدخراتي واستثماراتي          ',

        'less_than_50%_of_my_annual_income' => '    اقل من 50 %من مجموع دخلي السنوي          ',
        'almost_50%_of_my_annual_income' => '     تقريبا يمثل 50 %من مجموع دخلي السنوي                  ',
        'equal_to_my_annual_income' => '     يساوي مجموع دخلي السنوي          ',
        'almost_double_(2x)_of_my_annual_income' => '     تقريبا يمثل ضعفين (2x )مجموع دخلي السنوي            ',
        'almost_triple_(3x)_of_my_annual_income' => '      تقريبا يمثل ثلاث اضعاف (3x )مجموع دخلي السنوي             ',
        'almost_five_time_(5x)_of_my_annual_income' => '      تقريبا يمثل خمسة اضعاف (5x )مجموع دخلي السنوي             ',

        // q3
        'during_the_next_few_years_,_the_likelihood_of_my_annual_income_change_would_be' => '      خلال السنوات القليلة القادمة، من المحتمل تغير دخلي السنوي كالاتي:                  ',

        'slightly_decrease' => '    هبوط نسبي            ',
        'no_change' => '     يبقى كما هو عليه               ',
        'slightly_increase_than_the_annual_inflation' => '     ارتفاع بنسبة اعلى بقليل من نسبة التضخم السنوي             ',
        'remarkable_increase_than_the_annual_inflation' => '    ارتفاع اعلى بكثير من نسبة التضخم السنوي               ',
        'unstable_(from_my_investment)' => '      دخلي السنوي يعتمد ً كليا ً على دخل استثماراتي ويكون دائما متذبذب وغير متوقع
            ',

        // q4
        'regarding_my_major_expenses_before_retirement_(including_family_expenses_such_as_education_,_buying_a_house_etc)' => '       بالنسبة لمصاريفي الرئيسية المتوقعة قبل سِ ن التقاعد (بما في ذلك مصاريف افراد عائلتي كالتعليم والزاج وشراء منزل، الخ):
                        ',

        'i_will_manage_to_cover_all_expenses_from_my_annual_income' => '      سوف اتمكن من تغطية جميع المصاريف المتوقعة من خلال دخلي السنوي
                 ',
        'i_might_need_to_withdraw_some_of_my_saving_to_cover_expenses' => '    قد احتاج لسحب بعض مدخراتي لتغطية المصاريف             ',
        'i_might_need_to_withdraw_more_than_half_of_my_saving_to_cover_expenses' => '       .قد احتاج لسحب اكثر من نصف مدخراتي لتغطية المصاريف            ',
        'i_might_need_to_withdraw_all_my_saving_to_cover_expenses_before_retirement' => '        قد احتاج لسحب جميع مدخراتي لتغطية المصاريف قبل سن التقاعد           ',
        'i_dont_have_expected_expenses' => '       ليس لدي اي مصاريف رئيسية متوقعة                 ',

        // q5
        'based_on_my_current_lifestyle_and_health_state_,_the_likelihood_of_having_health_issue_during_the_next_10_years' => '      بناء على طبيعتي المعيشية وحالتي الصحية، احتمال اصابتي بمشاكل صحية (لا قدر الله) خلال السنوات العشر القادمة               ',

        'above_the_average' => '     .اعلى من المتوسط             ',
        'average' => '     المتوسط تقريبا                   ',
        'unlikely' => '       احتمال ضئيل                   ',
        'almost_no' => '     احتمال شبه معدوم بإذن ا              ',

        // q6
        'i_can_say_about_my_investment_experience' => '     يمكن شرح خبرتي الاستثمارية كالتالي:               ',

        'i_have_no_previous_experience_in_public_equity_markets_nor_mutual_funds' => '          لم استثمر من قبل في سوق الاسهم مباشرة او عن طريق صناديق استثمارية وليس لدي معرفة بهذا المجال             ',
        'i_have_a_little_knowledge_i_have_invested_a_little_amount_in_the_public_equity_markets_nor_mutual_funds' => '      إستثمرت القليل من قبل في سوق الاسهم مباشرة او عن طريق صناديق استثمارية ولدي معرفة بسيطة بهذا المجال                          ',
        'i_have_knowledge_i_have_invested_a_big_amount_in_the_public_equity_markets_nor_mutual_funds' => '      إستثمرت مبلغ عالي من قبل في سوق الاسهم مباشرة او عن طريق صناديق استثمارية ولدي معرفة بهذا المجال          ',
        'i_have_a_good_knowledge_i_have_invested_in_international_public_equity_markets_and_in_other_investment_tools_and_financial_derivatives' => '         .إستثمرت من قبل في اسواق عالمية وادوات استثمارية اخرى مثل الخيارات والمشتقات ولدي معرفة جيدة بهذا المجال             ',

        // q7
        'i_expect_to_start_withdrawing_my_saving' => '       اتوقع البدء بسحب اموال من مدخراتي:          ',

        'less_than_5_years' => '     خلال فترة أقل من 5 سنوات                ',
        '5_10_years' => '     سنوات 10 – 5                 ',
        '10_15_years' => '     سنة 15 – 10                 ',
        'more_than_15_years' => '    اكثر من 15 سنة                 ',
        'i_have_no_saving_or_i_have_already_withdrawing_from_it' => '    ليس لدي مدخرات او اقوم حاليا بالسحب منه            ',

        // q8
        'in_case_of_a_15%_declined_in_my_investments_market_value_in_a_short_time_(less_than_a_year)' => '         في حال هبوط القيمة السوقية لإستثماراتي بنسبة 15 %خلال فترة قصيرة (اقل من سنة)                        ',

        'i_would_sell_all_of_my_investments_to_save_what_have_left' => '      سوف اقوم ببيع جميع الاستثمارات للمحافظة على ما تبقى منه                ',
        'i_will_sell_part_of_my_investments_so_that_i_can_invest_in_other_lower_risk_tools' => '          سوف ابيع جزء منها واستثماره بأداة استثمارية اخرى قليلة المخاطر                  ',
        'i_would_not_sell_and_wait_to_recover_to_its_original_value' => '      عدم البيع والانتظار حتى تعود لقيمتها الاصلية                 ',
        'investing_more_money_to_reduce_the_cost_of_investments' => '        استثمار المزيد من المال لتقليل نسبة التكلفة                  ',

        // q9
        'in_which_investment_opportunity_would_you_invest_a_100,000_for_10_years' => '        لو عرض عليك اربع فرص استثمارية (d, c, b, a )لإستثمار  100,000مدة 10 سنوات، اي من الفرص التالية تفضل:            ',

        'after_10_years,_the_probability_of_best_investment_value_=_500,000_and_the_worst_=_50,000' => '       احتمال افضل قيمة للإستثمار بعد 10 سنوات = 500,000 ريال ، واسوء قيمة = 50,000 ريال                ',
        'after_10_years,_the_probability_of_best_investment_value_=_850,000_and_the_worst_=_20,000' => '     حتمال افضل قيمة للإستثمار بعد 10 سنوات = 850,000 ريال ، واسوء قيمة = 20,000 ريال                ',
        'after_10_years,_the_probability_of_best_investment_value_=_300,000_and_the_worst_=_65,000' => '       احتمال افضل قيمة للإستثمار بعد 10 سنوات = 300,000 ريال ، واسوء قيمة = 65,000 ريال                ',
        'after_10_years,_the_probability_of_best_investment_value_=_150,000_and_the_worst_=_100,000' => '       احتمال افضل قيمة للإستثمار بعد 10 سنوات = 150,000 ريال ، واسوء قيمة = 100,000 ريال                 ',

        // q10
        'when_i_buy_a_car_insurance_i_prefer' => '      عند شرائي وثيقة تأمين مركبة، افضل:             ',

        'insurance_with_the_highest_cover_even_if_it_was_expensive' => '     شراء وثيقة تأمين "شامل لأعلى تغطية" حتى لو كان سعر الوثيقة عالي               ',
        'insurance_with_a_limited_cover_even_if_it_was_expensive' => '       .شراء وثيقة تأمين "شامل التغطية الى حد معين" حتى ً لو كان سعر الوثيقة عالي نسبي                    ',
        'pay_a_lower_price_for_a_third_party_one' => '        دفع أقل ثمن وشراء وثيقة تأمين "ضد الغير"              ',
        'i_prefer_not_buying_a_care_insurance' => '      افضل عدم شراء وثيقة تأمين              ',


        'continue_to_objectives' => '   الاستمرار في الأهداف      ',
        'continue_to_payment' => ' تابع الدفع ',
        'continue' => 'استمر',


        // step 7
        'time_horizon' => '    الأفق الزمني (سن التقاعد)       ',
        'life_expectancy' => '    العمر المتوقع (بعد التقاعد)          ',

        'calculate_results' => '    حساب النتائج       ',



        // additional_info
        'monthly_contributions_year_1' => 'Monthly Contributions Year on 1',
        'annual_increase_in_contributions_percentage' => 'Annual Increase In Contributions Percentage',
        'withdrawl_amount_per_month' => 'Withdrawl Amount Per Month',

        'save' => 'حفظ',

    ],



    'questionnaire_start' => 'استبيان البداية ' ,
    'welcome' => 'أهلا بك ' ,
    'are_you_ready_to_start_your_new_future' => 'هل أنت مستعد لبدء مستقبلك الجديد؟ ',
    'order_summary' => 'معلومات الطلب',
    'download_sample' => 'اطلع على نموذج للخطة',



    'questionnaire' => [
        'step_1' => '      الخطوة     ١  ',
        'step_2' => '      الخطوة     ٢  ',
        'step_3' => '      الخطوة     ٣  ',
        'step_4' => '      الخطوة     ٤  ',
        'step_5' => '      الخطوة     ٥  ',
        'step_6' => '      الخطوة     ٦  ',
        'step_7' => '      الخطوة     ٧  ',
    ],



    'email_verification' => 'تحقق من الايميل',
    'your_email' => 'الايميل',



    'question_headings' => [
        'personal_info' => '  المعلومات الشخصية      ',
        'income' => '   الدخل      ',
        // 'expenses' => '   المصاريف     ', old value
        'expenses' => '   خطة الادخار  ',
        'net_assets' => '   صافي الاصول      ',
        'gosi' => 'GOSI',
        'risk' => '  المخاطر     ',
        'objectives' => '  الاهداف     ',
        
    ],

    
    'site_menu' => [
        'legal' => '   الإفصاح القانوني  ',
        'contact' => '  إتصل بنا  ',
        'about_us' => '   معلومات عنا  ',
        'pricing' => 'التسعير ',
        'help' => 'مساعدة ',
        'careers' => 'وظائف',
    ],

    'constants' => [
        'constants' => 'الثوابت',
        'edit_constant' => 'تحرير ثابت',
        'no_constants_found' => 'لم يتم العثور على الثوابت',
        'list_of_constants_used_in_calculation_formulae' => 'قائمة الثوابت المستخدمة في صيغ الحساب',
        'sr_no' => 'مسلسل  #',
        'belongs_to_types' => 'ينتمي إلى نوع',
        'attribute' => 'ينسب',
        'value' => 'القيمة',
        'action' => 'عمل',

    ],

    'log' => [
        'change_log' => 'تغيير السجل',
        'set_site_title_to' => 'تعيين عنوان الموقع إلى',
        'set_site_desc_to' => 'تعيين وصف الموقع إلى',
        'set_site_logo_to' => 'تعيين شعار الموقع إلى',
        'set_site_favicon_to' => 'تعيين أيقونة الموقع المفضل على',
        'set_maintenance_heading_to' => 'تعيين صيانة العنوان إلى',
        'set_maintenance_description_to' => 'اضبط وصف الصيانة على',
        'set_maintenance_image_to' => 'تعيين صورة الصيانة إلى',
        'set_maintenance_mode_off' => 'ضبط وضع الصيانة "OFF"',
        'set_maintenance_mode_on' => 'ضبط وضع الصيانة "ON"',
        'some_changes_detected' => 'تم اكتشاف بعض التغييرات ولكن تعذر تحويلها في شكل قابل للقراءة. استشر المطور.',
    ],

    'user' => [
        'profile' => 'الملف الشخصي',
        'name' => 'اسم',
        'membership' => 'عضوية',
        'data_reg' => 'تاريخ مسجل',
        'renewal_date' => 'تاريخ التجديد',
        'email_address' => 'عنوان البريد الإلكتروني',
        'password' => 'كلمه السر',
        'gender' => 'جنس',
        'phone' => 'رقم الهاتف',
        'report' => 'تقارير',
        'minimum_wealth' => '  الحد الأدنى للثروة   ',
        'maximum_wealth' => '  أقصى الثروة   ',

        'list_of_all_users_registered' => '   قائمة بجميع المستخدمين المسجلين  ',
    ],


    'reports' => [
        'assets' => '   استثمارات         ',
        'debts_liabilities' => '      الديون / الخصوم          ',


        'view_assets' => '     عرض  استثمارات              ',
        'view_liabilities' => '    عرض الالتزامات           ',
    ],



    'frontend_footer_content' => [
        'what_are_you_waiting_for' => '    ما الذي تنتظره؟      ',
        'lets_get_started_right_now' => '    لنبدأ على الفور.    ',


        'hi_my_name_is' => '    مرحبًا! اسمي هو     ',
        'and_i_am' => '    وعمري      ',
        'years_old' => '   سنوات   ',

        'start_the_questionnaire' => '   ابدأ أسئلة الاستبيان    ',


        // footer

        'footer_col_1' => '   توفر لك شركة الثراء للبرمجيات " Althraa Software LLC " (والمشار إليها باسم "الثراء") محركاً لتقديم المشورات المالية يستند على البرامج والذي يقوم بتوفير أدوات آلية للتخطيط المالي لمساعدة المستخدمين على تحقيق نتائج أفضل.       ',

        'footer_col_2___row_1' => '    باستخدامك لهذا الموقع، فإنك تعي وتفهم أن المعلومات المعروضة يتم تقديمها فقط لغرض المعرفة وتوافق على شروط الاستخدام وسياسة الخصوصية الخاصة بنا.        ',

        'footer_col_2___row_2' => '    يعتمد مستشارون الثراء على المعلومات المستمدة من مصادر مختلفة يُعتقد بموثوقيتها، بما في ذلك العملاء والأطراف الثالثة، ولكن المستشارين لا يستطيعون ضمان دقة تلك المعلومات واكتمالها. ولا ينبغي تأويل أي شيء في هذا البلاغ على أنه عرض أو توصية أو طلب لشراء أو بيع أي ضمانات.      ',

        'footer_col_2___row_3' => '     تشتمل كل الاستثمارات على مخاطر، بما في ذلك احتمال خسارة الأموال المُستثمرة، ولا يضمن الأداء السابق سريان الأداء في المستقبل.       ',


        'footer_col_3' => '     يتم تقديم الحساب النقدي من قبل شركة الثراء للوساطة المالية ("الثراء للسمسرة "). ولا تعتبر شركة الثراء للسمسرة ولا أي من الشركات التابعة لها من البنوك. يتم تحويل الرصيد النقدي المتواجد في الحساب النقدي إلى واحد أو أكثر من البنوك ("البنوك الخاصة بالبرنامج") حيث يحصل على معدل فائدة متغير ويكون مؤهلا للحصول على تأمين من الشركة الفيدرالية لتأمين الودائع FDIC. ولا يتم توفير التأمين من الشركة الفيدرالية لتأمين الودائع FDIC إلا بعد وصول الأموال إلى بنوك البرامج.       ',
    ],


    // frontend legal
    'frontend_legal' => [
        'legal' => '   قانوني    ',
        'legal_heading_text' => '   جميع المستندات القانونية التي تحتاج إليها للبدء مع الثراء       ',

        'legal_heading1' => '   العنوان   1     ',
        
        'legal_heading1__point1' => '    اتفاقيات العميل -الحسابات الخاضعة للضريبة      ',
        'legal_heading1__text1' => '     هذه هي الشروط التي توافق عليها عندما تصبح أحد العملاء لدى الثراء.          ',
        'legal_heading1__point2' => '      اتفاقيات العملاء -حسابات IRA         ',
        'legal_heading1__text2' => '     هذه هي الشروط التي توافق عليها عندما تصبح أحد عملاء الثراء لحسابات IRA.       ',
        'legal_heading1__point3' => '    اتفاقيات العملاء رقم   529       ',
        'legal_heading1__text3' => '    هذه هي الشروط التي توافق عليها عند فتح خطة الثراء رقم 529 الخاصة بالادخار للتعليم الجامعي.       ',


        'legal_heading2' => '  العنوان     2',
        'legal_heading2__point1' => '    اتفاقيات العميل -الحسابات الخاضعة للضريبة      ',
        'legal_heading2__text1' => '     هذه هي الشروط التي توافق عليها عندما تصبح أحد العملاء لدى الثراء.          ',


        'legal_heading3' => '   العنوان     3',



        'about_our_services' => 'About our services',
        'about_our_services_text' => 'Dokhor.com or those responsible for does not provide any representations or guarantees (express or implied) regarding the data and information provided, despite the reliability of the sources of information and reasonable care in the data, but it does not acknowledge that the information contained in this site or its documents is complete or free from any error or Not misleading or suitable for any specific purpose.',


        'purpose' => 'Purpose',
        'purpose_text' => 'The document or information on this site only provides general information. It is also the information and any opinion expressed on this site or any document thereof that does not constitute an offer or an invitation to make an offer to buy or sell any securities or other investment products related to those securities or investments. The purpose of this site or its documents is not to provide personal advice in the investment field nor does it take into account the investment objectives, financial situation or the specific needs of any specific person who may receive this document. Investors should seek financial, legal or tax advice from a financial company licensed by the Capital Market Authority or relevant government agencies on the appropriateness of investing in any securities, other investment or any investment strategies discussed or recommended on this site or documents Issued by it, customers should understand that data related to future expectations coming from this site may not be fulfilled , Clients should also note that income from securities of this type or other investments, if any, may be subject to fluctuations and that the price or value of those securities and investments is subject to increase or decrease. Also, fluctuations in the exchange rates of currencies may have negative effects on the value, price, or income of certain investments. Consequently, clients can receive a return that is mainly less than the amount of their invested capital.',


        'stake_and_responsabilities' => 'Stake and responsabilities',
        'stake_and_responsabilities_text_1' => 'The site or its officials, including financial analysts, may have a financial interest in the securities of the entity or the issuers of those securities or related investments, including long or short-term positions in securities or investment funds, or other financial instruments. The site may also, from time to time, perform additional consulting services or seek to secure these services or other business from any of the companies mentioned in the reports or documents issued by it. The site or its officials, including employees of the site, are not responsible for any direct or indirect damages or any other loss or damage that may arise, directly or indirectly, from any use of the information contained in this document from the documents issued from the site , Information issued by the site and any recommendations contained therein are subject to change without prior notice. . The site does not assume any responsibility for updating the information contained in these documents issued by it. ',

        'stake_and_responsabilities_text_2' => 'This document may not be changed, duplicated, transmitted or distributed in whole or in part, in any form or by any means. It should also be noted that these documents are not directed to or intended for distribution or use by any person or entity, whether a citizen or resident in any place, country, country or any other judicial authority, wherever such distribution, publication, availability or use of the issued documents From the site is against the law or requires the site or its operators to make any registration or fulfill any of the licensing conditions within that country or that judicial authority.',
    ],

    'frontend_contact' => [
        'contact' => '   التواصل     ',
        'contact_heading_text' => ' تواصل مع المؤسسين مباشرة ',

        'contact_send_us_a_message' => '   أرسل لنا رسالة بالبريد الإلكتروني        ',
        'contact_email' => '   البريد الإلكتروني         ',
        'contact_email_placeholder' => 'من فضلك قم بكتابة البريد الإلكتروني الخاص بك هنا  ',
        'contact_name' => '   الاسم        ',
        'contact_name_placeholder' => ' من فضلك قم بكتابة الاسم هنا  ',
        'contact_message' => '   الرسالة        ',
        'contact_message_placeholder' => ' من فضلك قم بإدخال رسالتك هنا  ',
        'contact_send' => '  إرسال         ',


        'contact_other' => '  غير ذلك   ',
        'contact_other_email_us_directly' => '   قم بمراسلتنا مباشرةً عبر البريد الإلكتروني     ',
        'contact_other_you_can_email_us_here' => '    يمكنك أيضًا مراسلتنا عبر البريد الإلكتروني هنا:       ',
        'contact_other_email' => ' contact@althraa.com ',
        'contact_other_need_any_assistance' => '   هل تحتاج إلى أي مساعدة؟      ',
        'contact_other_visit_our_help_page' => '    تفضل بزيارة صفحة المساعدة الخاصة بنا:       ',
        'contact_other_help' => '     المساعدة      ',
        'contact_other_timings' => '    نحن متاحين يوميا من الساعة 8 صباحا وحتى 4 مساءا           ',
    ],


    'frontend_about' => [
        'about_us' => '   نبذة عنا     ',
        'about_our_story' => '   قصتنا     ',

        'about_coffee_started_it_all' => '    بدأت القهوة كل شيء.        ',
        'about_coffee_text' => '      التقى وليد (MBA، CFA) بعلي (دكتوراه في التكنولوجيا الأمنية) في أحد الأيام لتناول القهوة والتحدث عن الاستثمار. ومن ثم اكتشفا خلال الاجتماع أنهما لم يكونا متحمسين فقط لموضوعات الاستثمار، بل كانا يشكلان المزيج المثالي لبدء التطبيق الذي يمكن أن يساعد أمة كاملة.           ',

        'mission' => 'الرسالة ',
        'mission_text' => 'Richness and financial independence have an equation that the rich know well but which are easy and kind. Our mission is to be an automated financial advisor for individuals who makes this equation:',
        'mission_text_report' => 'مهمتنا ان نكون المخطط المالي الآلي الموثوق للافراد مع تحقيق التوزان في الأركان التالية',

        'mission_li_1' => 'سهل ممتنع .',
        'mission_li_2' => 'عملي ويتيح التطبيق الفوري  .',
        'mission_li_3' => 'حصيف وبعيد عن العشوائية . ',
        'mission_li_4' => 'مناسب للاحتياجات الشخصية ',


        'method' => 'المنهجية',
        'method_text' => 'نتبنى منهجية الاستثمار طويل الاجل في التخطيط المالي الشخصي والتي تعتمد على : ',

        'method_li_1' => 'الإدخار أولاً .',
        'method_li_2' => 'تطبيق منهجية الإستثمار الحصيفة طويلة الأجل .',
        'method_li_3' => 'الاستفادة من سحر العوائد المتراكمة .',

        'team' => 'فريق العمل',
        'meat_team' => 'Meat our amazing team',


        'althraa_arabic_meaning' => '   الثراء هو الكلمة العربية المعبرة عن الثروة      ',

        'about_our_vision' => '   رؤيتنا      ',
        'about_our_vision_text' => '    في الثراء نعتقد أن الخدمات المالية الشخصية وإدارة الأموال ليست خدمات حصرية للأغنياء فقط.        ',

        'cofee_text_1' => '     (دكتوراه في التكنولوجيا الأمنية)          بعلى (MBA، CFA) التقى وليد        ', 
        'cofee_text_2' => 'في أحد الأيام لتناول القهوة والتحدث عن الاستثمار. ومن ثم اكتشفا خلال الاجتماع أنهما لم يكونا متحمسين فقط لموضوعات الاستثمار، بل كانا يشكلان المزيج المثالي لبدء التطبيق الذي يمكن أن يساعد أمة كاملة.',

        'founder' => 'المؤسسين', 
        'waleed' => ' وليد بن عبدالله  باكرمان ',
        'waleed_designation' => ' (الشريك المالي) ',

        'waleed_li_1' => 'ماجستير ادارة اعمال من جامعة الأمير سلطان ',
        'waleed_li_2' => 'مجتاز اختبار المحلل المالي المعتمد      (CFA)     المستوى الأول ، واختبار محلل الاستثمارات البديلة      (CAIA)      المستوى الأول مرشح للمستوى الثاني',
        'waleed_li_3' => 'عمل مستشار ماليا في وزارة البيئة والمياه والزراعة قطاع الخصخصة .',
        'waleed_li_4' => 'خبرة 11 سنة في الاستثمار والتطوير العقاري والمليكات الخاصة في قطاع الطبي و التجزئة والأطعمة .  ',
        'waleed_li_5' => 'يعمل حاليا مدير إدارة تطوير الأعمال في هيئة حكومية .',


        'bakarman' => 'وليد باكرمان',
        'ali' => ' د. علي بن عبدالرحمن الشهري ',
        'ali_designation' => ' (الشريك التقني) ',

        'ali_li_1' => ' حاصل على درجة الماجستير والدكتوراه في تخصص الامن السيبراني والتقنيات المالية. ',
        'ali_li_2' => ' خبير في امن أنظمة الدفع المالية الالكترونية. ',
        'ali_li_3' => ' خبير في امن التقنيات المالية باستخدام ال          مثل  APPLE PAY ',
        'ali_li_4' => ' خبير في تقنية البلوكتشين. ',
        'ali_li_5' => '  عمل مستشارا في وزارة الاتصالات وتقنية المعلومات في الاستراتيجية الوطنية لتقنية البلوكتشين. ',
        'ali_li_6' => ' عمل مستشارا في وزارة الاتصالات وتقنية المعلومات في مجال العملات الرقمية وامنها.  ',
        'ali_li_7' => ' عالم في الأنظمة التشفيرية وكسرها مع منشورات علمية عدة في هذا المجال.  ',
    ],


    'frontend_disclaimer' => [
        'text' => 'موقع دخر او القائمين على لا يقدم أية إقرارات أو ضمانات (صريحة أو ضمنية) بشأن البيانات والمعلومات المقدمة وبالرغم من موثوقية مصادر المعلومات والعناية المعقولة في البيانات الا أنه 
لا يقر بأن المعلومات التي يتضمنها هذا الموقع او وثائقه هي معلومات كاملة أو خالية من أي خطأ أو غير مضللة أو أنها تصلح ألي غرض محدد. فالوثيقة او المعلومات في هذا الموقع  إنما 
تقدم معلومات عامة فقط . كما أنه المعلومات وأي رأي وارد في هذا الموقع أو اي وثيقة منه لا تشكل عرضا أو دعوة لتقديم عرض لشراء أو بيع أي أوراق مالية أو غيرها من المنتجات 
االستثمارية ذات الصلة بتلك الأوراق المالية أو الإستثمارات. وليس الغرض من هذه الموقع أو وثائقه تقديم مشورة شخصية في مجال الإستثمار كما أنها لا تأخذ في الإعتبار الأهداف 
الإستثمارية أو الوضع المالي أو الإحتياجات المحددة لأي شخص معين قد يستلم هذه الوثيقة . ينبغي للمستثمرين السعي للحصول على المشورة المالية أو القانونية أو الضريبية من شركة 
مالية مرخصة من هيئة السوق المالية او الجهات الحكومية ذات العلاقة بشأن مدى ملائمة الإستثمار في أي أوراق مالية ، أو استثمار آخر أو أية استراتيجيات استثمار جرت مناقشتها أو 
التوصية بها في هذا الموقع او الوثائق الصادرة عنه ، وينبغي للعملاء تفهم أن البيانات المتعلقة بالتوقعات المستقبلية الوارد من هذا الموقع قد لا تتحقق. كذلك ينبغي للعملاء ملاحظة أن 
الدخل من أوراق مالية من هذا النوع أو غيرها من الإستثمارات ، إن وجد ، قد يتعرض للتقلبات وبأن سعر أو قيمة تلك الأوراق المالية والإستثمارات يكون عرضة للإرتفاع أو الإنخفاض. كما أن 
التقلبات في أسعار الصرف للعملات قد يكون لها آثار سلبية على القيمة أو الثمن ، أو الدخل المتأتي من استثمارات معينة. وبناء عليه ، يمكن للعملاء أن يحصلوا على عائد يكون أقل من مبلغ 
رأسمالهم المستثمر أساسا. ويجوز أن يكون للموقع  أو المسئولين فيها بما في ذلك المحللين الماليين مصلحة مالية في الأوراق المالية للجهة أو الجهات المصدرة لتلك الأوراق المالية أو 
الإستثمارات ذات العلاقة ، بما في ذلك المراكز طويلة أو قصيرة الأجل في الأوراق المالية أو صناديق الاستثمار ، أو غيرها من الأدوات المالية. كما يجوز للموقع أن يقوم من وقت لآخر بأداء 
الخدمات الاستشارية الاضافية أو السعي لتأمين هذه الخدمات أو غيرها من الأعمال من أي شركة من الشركات المذكورة في التقارير او الوثائق الصادرة منه . والموقع او المسؤولون فيه ، بما 
في ذلك الموظفين التابعية للموقع ، لا يكونون مسؤولين عن أي أضرار مباشرة أو غير مباشرة أو أي خسارة أو أضرار أخرى قد تنشأ ، بصورة مباشرة أو غير مباشرة ، من أي استخدام للمعلومات 
الواردة في هذه الوثيقة من وثائق الصادرة من الموقع ، تخضع معلومات الصادرة من الموقع وأية توصيات واردة فيها للتغيير دون إشعار مسبق. وموقع دخر لا يتحمل أي مسؤولية عن تحديث 
المعلومات الواردة في هذه الوثائق الصادرةمنه. ولا يجوز تغيير أو استنساخ أو إرسال أو توزيع هذه الوثيقة من وثائق الموقع كليا أو جزئيا بأي شكل أو بأي وسيلة. كما يراعى أن هذه الوثائق 
ليست موجهة إلى أو معدة للتوزيع أو الإستخدامها من قبل أي شخص أو كيان سواء كان مواطنا أو مقيما في أي مكان أو دولة أو بلد أو أية جهه قضائية أخرى ، حيثما يكون مثل هذا التوزيع 
أو النشر أو توافر أو استخدام الوثائق الصادرة من الموقع مخالفا للقانون أو يتطلب من الموقع او القائمين عليه القيام بأي تسجيل أو استيفاء أي شرط من شروط الترخيص ضمن ذلك البلد أو 
تلك الجهه القضائية'
    ],


    'pdf_disclaimer' => 'عقوم رخد وا نیمئاقلا ىلع لا مدقی ةیأ تارارقإ وأ تانامض ةحیرص( وأ )ةینمض نأشب تانایبلا تامولعملاو ،ةمدقملا مغرلابو نم ةیقوثوم رداصم تامولعملا ةیانعلاو ةلوقعملا يف تانایبلا لاا ھنأ لا رقی نأب تامولعملا يتلا اھنمضتی اذھ عقوملا وا ئاثو ھق يھ تامولعم ةلماك وأ ةیلاخ نم يأ أطخ وأ ریغ ةللضم وأ اھنأ حلصت ىلإ ضرغ ددحم امك نا عقوم رخد و نیمئاقلا ھیلع نولخی مھتیلوؤسم نع يأ عون نم عاونأ تانامضلا ةقلعتملا قیقحتب ةجیتن حبر ،ةنیعم سوا ًء تناك ةحیرص وأ ةینمض . لاف ةقیثو وا تامولعملا يف اذھ عقوملا امنإ مدقت تامولعم ةماع طقف . امك ھنأ تامولعملا يأو ً وأ ةوعد میدقتل ضرع يأر دراو يف اذھ عقوملا وأ يا ةقیثو ھنم لا لكشت عرضا ءارشل وأ عیب يأ قاروأ ةیلام وأ اھریغ نم تاجتنملا ةیرامثتسلاا تاذ ةلصلا كلتب قارولأا ةیلاملا وأ تارامثتسلاا . سیلو ضرغلا نم هذھ عقوملا وأ ھقئاثو میدقت ةروشم ةیصخش يف لاجم رامثتسلإا امك اھنأ لا ذخأت يف رابتعلإا فادھلأا ةیرامثتسلإا وأ عضولا يلاملا وأ تاجایتحلإا ةددحملا يلأ صخش نیعم دق ملتسی هذھ ،ةقیثولا يغبنیو نیرمثتسملل يعسلا لوصحلل ىلع ةروشملا ةیلاملا وأ ةینوناقلا وأ ةیبیرضلا نم ش ةكر ةیلام ةصخرم نم ةئیھ قوسلا ةیلاملا وا تاھجلا ةیموكحلا تاذ ةقلاعلا نأشب ىدم ةمئلام رامثتسلإا يف يأ قاروأ ةیلام ، وأ رامثتسا رخآ وأ ةیأ تایجیتارتسا رامثتسا ترج اھتشقانم وأ ةیصوتلا اھب يف اذھ عقوملا وا قئاثولا ةرداصلا ھنع ، يغبنیو ءلامعلل مھفت نأ تانایبلا ةقلعتملا تاعقوتلاب ةیلبقتسملا دراولا نم اذھ عقوملا دق لا ققحتت . كلذك يغبنی ءلامعلل ةظحلام نأ لخدلا نم قاروأ ةیلام نم اذھ عونلا وأ اھریغ نم تارامثتسلإا ، نإ دجو ، دق ضرعتی تابلقتلل نأبو رعس وأ ةمیق كلت قارولأا ةیلاملا تارامثتسلإاو نوكی ةضرع عافترلإل وأ ضافخنلإا . امك نأ تابلقتلا يف راعسأ فرصلا تلامعلل دق نوكی اھل راثآ ةیبلس ىلع ةمیقلا وأ نمثلا ، وأ لخدلا يتأتملا نم تارامثتسا ةنیعم . ءانبو ھیلع ، نكمی ءلامعلل نأ اولصحی ىلع دئاع وكی ن لقأ نم غلبم مھلامسأر رمثتسملا ابتدا ًء . زوجیو نأ نوكی عقوملل وأ نیلوئسملا ھیف ا امب يف كلذ نیللحملا نییلاملا ةحلصم ةیلام يف قارولأا ةیلاملا ةھجلل وأ تاھجلا ةردصملا كلتل قارولأا ةیلاملا وأ تارامثتسلإا تاذ ةقلاعلا ، امب يف كلذ زكارملا ةلیوط وأ ةریصق لجلأا يف قارولأا ةیلاملا وأ قیدانص رامثتسلاا ، وأ اھریغ نم تاودلأا ةیلاملا . امك زوجی عقوملل نأ موقی نم تقو رخلآ ءادأب تامدخلا ةیراشتسلاا ةیفاضلاا وأ يعسلا نیمأتل هذھ تامدخلا وأ اھریغ نم لامعلأا نم يأ ةكرش نم تاكرشلا ةروكذملا يف ریراقتلا وا قئاثولا ةرداصلا ھنم . عقوملاو وا نولوؤسملا ،ھیف امب يف كلذ نیفظوملا ةیعباتلا ،عقوملل لا نونوكی نیلوؤسم نع يأ رارضأ ةرشابم أو ریغ ةرشابم وأ يأ ةراسخ وأ رارضأ ىرخأ دق ،أشنت ةروصب ةرشابم وأ ریغ ،ةرشابم نم يأ مادختسا تامولعملل ةدراولا يف هذھ ةقیثولا وأ اھریغ نم قئاثولا ةرداصلا نم عقوملا ، عضختو تامولعملا ةرداصلا نم عقوملا ةیأو تایصوت ةدراو اھیف رییغتلل نود راعشإ قبسم . عقومو رخد لا لمحتی يأ ةیلوؤسم نع ثیدحت تامولعملا ةدراولا يف هذھ قئاثولا ةرداصلا ھنم . لاو زوجی رییغت وأ خاسنتسا وأ ً يأب لكش وأ يأب ةلیسو ً وأ جزئیا لاسرإ وأ عیزوت هذھ ةقیثولا نم قئاثو عقوملا كلیا تناك . امك ىعاری نأ هذھ قئاثولا تسیل ةھجوم وأ ةدعم عیزوتلل وأ مادختسلا نم لبق يأ صخش وأ نایك ءاوس ناك انطاوم وأ امیقم يف يأ ناكم وأ ةلود وأ دلب وأ ةیأ ھھج ةیئاضق ىرخأ ، امثیح نوكی لثم اذھ عیزوتلا وأ رشنلا وأ رفاوت وأ مادختسا قئاثولا ةرداصلا نم عقوملا افلاخم نوناقلل وأ بلطتی نم عقوملا وا نیمئاقلا ھیلع مایقلا يأب لیجست وأ ءافیتسا يأ طرش نم طورش صیخرتلا نمض كلذ دلبلا وأ ك',

    // admin panel
    'staff' => '  فريق العمل        ',
    'admin' => [
        'site_settings' => '  إعدادات الموقع      ',
        'settings' => '  اإلعدادات      ',
        'maintenance' => '   الصيانة     ',

        'site_name__google_search_and_browser_tab__' => '   اسم الموقع (بحث Google وعالمة تبويب المتصفح)     ',
        'site_description' => '  وصف المواقع      ',
        'illustration' => '  الشكل التوضيحي      ',
        'click_here_to_upload_new' => '  انقر هنا لتحميل جديد      ',
        'favicon' => '  فافيكون      ',
        'save_changes' => '  حفظ التغييرات      ',
        'logo_type' => '  الشعار      ',
        'turn_it_on' => ' قم بتشغيله       ',


        'staff' => '  فريق العمل        ',
        'add' => '   أضف       ',
        'email' => '   البريد اإللكتروني       ',
        'moderator_or_administrator' => '    مشرف أو مسؤول      ',
        'admin' => '   مشرف       ',
        'set_to_moderator' => '   لتعيين المشرف       ',
        'moderator' => '   المشرف       ',
        'set_to_admin' => '   قم بالتعيين كمسؤول       ',
        'remove_from_staff' => '  قم بإزالته من فريق العمل        ',
        'no_user_found' => '   لم يتم العثور على المستخدم       ',
        'type_a_role' => '   اكتب دورا    ',
        'type_an_email' => '    ًي اكتب البري ًد اإل
لكترون    ',
            
        'add_new_user' => 'إضافة مستخدم جديد', 
        'user_add_successfully' => 'تمت إضافة المستخدم بنجاح',

        'confirmation' => 'هل انت متاكد من تغير رتبة المستخدم؟',




        'user' => '    المستخدم  ',
        'questionnaire_settings' => '  إعدادات االستبيان      ',
        'change_log' => '  تغيير السجل     ',
        'welcome' => '  أهلا بك    ',



        'january' => 'يناير  ',
        'february' => ' فبراير   ',
        'march' => '  مارس   ',
        'april' => '  أبريل   ',
        'may' => '  مايو  ',
        'june' => '  يونيو  ',
        'july' => '  يوليو  ',
        'august' => '  أغسطس  ',
        'september' => '   سبتمبر  ',
        'october' => '  أكتوبر  ',
        'november' => '  نوفمبر   ',
        'december' => '  ديسمبر  ',




        'this_month' => '  هذا الشهر   ',
        'today' => '  هذا اليوم   ',
        'last_month' => '  الشهر الماضي   ',
        'registered_users' => '  المستخدمون المسجلون   ',
        '1+_execution' => '  1 +التنفيذ   ',
        'planning' => '  التخطيط   ',
        '2+_portfolio_review' => '  2 +مراجعة مجموعة الملفات المنجزة   ',
        'canceled_membership' => '  العضويات الملغاة   ',
        'earnings' => '  األرباح   ',

       
    ],


    'user_sidebar' => [
        'homepage' => 'الصفحة الرئيسية ',
        'questionnaire' => 'استبيان  ',
        'current_situation' => 'الأوضاع الحالية',
        'financial_plan' => 'خطة مالية',
        'settings' => 'الإعدادات',
        
    ],

    'user_index' => [
        'hi_there' => 'مرحبا عزيزي ',
        'questionnaire_complete_percentage' => 'استبيان النسبة المئوية',
        'any_updates_on_your' => 'هل لديك آي تحديثات ؟',
        'you_should_update' => 'يجب عليك تحديث الاستبيان الخاص بك بانتظام.',
        'last_time_updates' => 'آخر مرة تم تحديثها: ',
        'update_now' => 'تحديث الان',
        'current_net_worth' => 'صافي الدخل الشخصي',
        'net_personal_income' => 'صافي القيمة الحالية ',
        
    ],

    'additional_information' => [
        'your_potential_monthly_saving_is' => '  الادخار الشهري المحتمل هو     ',
        'i_want_to_increase_my_current_saving_to_be' => '   أريد زيادة مدخراتي الحالية  ',
        'annual_increase_in_saving' => ' الزيادة السنوية في الادخار (٪)    ',
        'monthelly_withdraw_after_retirement_is' => '     السحب الشهري بعد التقاعد هو       ',
        
    ],

    'current_state' => [
        'current_state' => 'الوضع الحالي',
        'this_is_how_are_you_currently_performing' => 'هذا ما تقوم به حاليا',

        'saving_evaluation' => 'تقييم الادخار ',
        'net_personal_income' => ' صافي الدخل الشخصي   ',

        'broken' => 'مفلس    ',
        'poor_saver' => ' مدخر ضعيف   ',
        'good_saver' => ' مدخر جيد ',
        'excellent_saver' => ' مدخر ممتاز ',
        'wealthy' => 'ثري   ',

        'saving' => 'إنقاذ',
        'spending' => 'الإنفاق',
        'current' => 'تيار',
        'possible' => 'ممكن',


        'networth_evaluation' => ' تقييم نيتورث ',       
        'networth' => '  القيمة الصافية   ', 

        'total_assets' => '  إجمالي الأصول  ',

        'personal_assets' => ' الأصول الشخصية ',
        'unliquid_assets' => '   الأصول غير المصفاة  ',
        'liquid_assets' => '   الأصول السائلة  ',
        'debts_liabilities' => '    الديون / التزامات    ',    
        'subtotal' => '    المجموع الفرعي:   ',   

        'liabilities' => '  التزامات  ',    
        'total_liabilities' => '   اجمالي المطلوبات   ',    


        'investment_evaluation' => '    تقييم الاستثمار ',    

        'at_age' => '    في سن الـ  ',
        'you_will_have_savings_balance_of' => '   سيكون لديك رصيد مدخر قدره    ',

    ],

    'financial_plan' => [
        'select_plan' => '  اختر خطة ',
        'for_investment_evaluation' => '   لتقييم الاستثمار   ',
        'suggested' => '   اقترحت ',
        'selected' => '  المحدد   ',

        'more_conservative' => '   أكثر محافظة  ',
        'conservative' => '  تحفظا  ',
        'below_average' => '  أقل من المتوسط   ',
        'above_average' => '  فوق المتوسط  ',
        'aggressive' => '  العدواني  ',
        'more_aggressive' => '   أكثر عدوانية   ',

        'fiancial_plan' => '   خطة مالية ',
        'this_is_how_you_could_be' => '  هذه هي الطريقة التي يمكن أن تؤديها (بناءً على الاستبيان).  ',

        'asset_allocation' => '   توزيع الأصول  ',
        'chart' => '  رسم بياني      ',
        'input' => '  إدخال   ',

        'print_save_result' => '  طباعة / حفظ النتائج  ',
        'suggested_risk_tolerance' => '  الخطر المحتمل   ',

        'cash_and_deposit' => '  النقد والودائع   ',
        'local_equity' => '   الأسهم المحلية  ',
        'us_govt_equity' => '  أسهم (حكومة) الولايات المتحدة   ',
        'international_equity' => '  الأسهم الدولية   ',
        'fix_income' => '  إصلاح الدخل    ',
        'corporate_bonds' => '  سندات و صكوك شركات ',
        'local_real_estate' => '  العقارات المحلية   ',
        'international_real_estate' => '  العقارات الدولية     ',


        'congratulations' => '  تهانينا   ! ',
        'chart_details' => '   تفاصيل المخطط     ',

        'working_years_accumulation_phase' => ' Before Retirement(Working phase)',
        'retirement_years_distribution_phase' => '    سنوات التقاعد - مرحلة التوزيع  ',
        
        'year' => '  السنة   ',
        'age' => '  العمر  ',
        'value_beginning_year' => '  القيمة داية السنة      ',
        'contributions' => '  المساهمات  ',
        'returns' => 'إلارجاع  ',
        'value_end_year' => '   القيمة نهاية السنة   ',
        'withdrawals' => '  السحب   ',

        'before_retirement' => '  قبل التقاعد  ',
        'age_chart' => '  مخطط العمر  ',
        'saving_withdrawl' => '   حفظ السحب  ',

        'input' => 'إدخال',
        'before_retirement' => 'قبل التقاعد',
        'your_current_age' => 'عمرك الحالي',
        'current_portfolio_balance_saved' => 'رصيد المحفظة الحالي المحفوظ (ريال سعودي)',
        'monthly_contributions_year_1' => 'المساهمات الشهرية السنة الأولى (ريال سعودي)',
        'annual_contributions_year_1' => 'المساهمات السنوية السنة 1 (ريال سعودي)',
        'annual_increase_in_contributions' => 'الزيادة السنوية في المساهمات (٪)',
        'annual_inflation_and_income' => 'معدل التضخم المفترض (٪)',
        'expected_real_return_per_year' => 'العائد الحقيقي المتوقع في السنة  (٪)',
        'expected_nominal_return_per_year' => 'العائد الاسمي المتوقع في السنة (٪)',

        'after_retirement' => 'بعد التقاعد',
        'annual_pension_benefit' => 'معاش التقاعد السنوي (ريال سعودي)',
        'annual_pension_benefit_percentage' => 'زيادة معاشات التقاعد السنوية (٪)',
        'desired_retirement_age' => 'سن التقاعد المطلوب',
        'withdrawal_amount_per_month' => 'مبلغ السحب شهريا  (ريال سعودي) ',
        'withdrawal_amount_per_year' => 'مبلغ السحب في السنة    (ريال سعودي) ',
        'inflation_adjusted_withrawal' => 'التضخم المعدل السحب / سنة. عند التقاعد',
    ],

    'results' => 'النتائج',

    'frontend' => [
        'althraa' => '  الثراء     ',

        'two_factor_verification' => '   التحقق من عاملين   ',
        'two_factor_message' => 'قد أرسلنا لك رمز المصادقة لعاملين. إذا لم تستلمها ، فانقر فوق  ',
        'two_factor_here' => '  هنا   ',
        'two_factor_verification_code' => '   اثنين من رمز التحقق عامل  ',
        'enter_two_factor_authentication_code_here' => '  أدخل رمز المصادقة عامل اثنين هنا  ',
        'verify' => '  تحقق  ',

        'slider_heading' => '  ذُخر هو مستشارك المالي الآلي الخاص 
        والذي يساعدك في بناء محفظتك الاستثمارية للتقاعد
        وفق مبدأ  الاستثمار طويل الأجل وسحر العائد التراكمي .. خطوة خطوة   ',

        'slider_text' => '   هنا في الثراء؛ نحب مساعدة الناس الذين يرغبون في التحكم في حياتهم المالية. بدون أي مكالمات محرجة وبدون خجل.      ',

        'steps' => '   الخطوات    ',
        'how_does_it_work' => '     كيف يتم العمل؟       ',

        '1' => '١',
        '2' => '٢',
        '3' => '٣',
        '4' => '٤',
        '5' => '٥',

        'answer_our_questions' => '   قم بالإجابة عن أسئلتنا    ',
        'get_report' => '   احصل على التقرير     ',
        'get_long_term_plans' => '   احصل على خطط طويلة المدى     ',
        'start_the_implementation' => '    ابدأ بالتطبيق    ',
        'start_investing_right_away' => 'أبدأ بالاستثمار حالا',
        'get_holistic_financial_plan' => 'أحصل على خطة مالية شاملة',
        'periodic_evaluation' => '    التقويم الدوري    ',


        'personal_financial_planning' => '   التخطيط المالي الشخصي   ',
        'personal_financial_planning_text' => '    كل شيء هنا في الثراء يدور حول إعطائك ما تحتاجه. حيث يمنحنا الاستبيان القدرة على وضع خطط مخصصة لكل فرد من عملائنا.      ',

        'get_started' => '   البدء   ',
        'get_started_uppercase' => '   البدء   ',

        'invest_your_own_money' => '   قم باستثمار أموالك الخاصة    ',
        'invest_your_own_money_text' => '    بمجرد حصولك على خطتك الخاصة، سوف تكون مستعدًا للاستثمار المخطط له حتّى تتمكن من تحقيق أقصى استفادة من أموالك والحصول عليها للعمل لحسابك.      ',

        'periodic_evaluation_text' => '     كل شيء هنا في الثراء يدور حول إعطائك ما تحتاجه. حيث يمنحنا الاستبيان القدرة على وضع خطط مخصصة لكل فرد من عملائنا.      ',

        'ribbon_heading' => 'الخطوات    ',
        'ribbon_text' => 'كيف يتم العمل    ',
        'secondary_text_slider' => '   نأخذ بيدك  خطوة بخطوة بخطوات عملية مع شركاءنا الماليين
لتحقيق الحرية المالية وفق اكثر المعايير المالية موثوقية وحصافة    ', 

		'home_icon_text_1' => '    بدا  بالاستثمار حالا مع تقييم دوري    ',
		'home_icon_text_2' => '    حصل على خطة مالية شاملة    ',
		'home_icon_text_3' => '    أجب عن الأسئلة    ',
    ],

    'payment_method' => 'طريقة الدفع او السداد',
    'get_your_report' => 'احصل على التقري',
    'card_no' => 'رقم البطاقة',
    'card_holder' => 'إسم صاحب البطاقة',
    'expire_date' => 'تاريخ انتهاء الصلاحية',
    'cvv' => 'CVV',


    'thanks' => 'شكرا لك',
    'thanks_message' => 'شكرا لك على التقديم. يرجى التحقق من بريدك الإلكتروني لطباعة / تنزيل التقرير',



    'report' => [
        'thank_you_for' => 'شكرا  لك ونتشرف <br> بك في عائلة عملاء ذخر ',
        'we_hope' => 'نتمنى لك الالتزام بالخطة المالية  وتحقيق اهدافك المالية بنجاح  ',


        'financial_health_checkup' => 'فحص الصحة المالية الشخصية',
        'personal_information' => 'المعلومات الشخصية',
            'name' => 'الاسم ',
            'education' => 'المستوى التعليمي',
            'current_age' => 'العمر حالياً',
            'planned_retirement_age' => 'العمر المخطط للتقاعد ',

        'financial_position_today' => 'الملاءه المالية اليوم ',
            'monthly_income_today' => 'الدخل الشهري اليوم',
            'gosi_ppa_monthly_subscription' => 'الاستقطاع الشهري ( التأمينات الاجتماعية / التقاعد ) ',
            'monthly_saving_plan_for_reitirement' => 'الادخار الشهري للخطة المالية الشخصية ',
            'monthly_saving_percentage_today' => 'معدل الادخار الشهري اليوم %',

            'total_assets_today' => 'اجمالي الاصول الشخصية اليوم ',
            'total_liabilities_today' => 'اجمالي الديون الشخصية اليوم ',
            'net_worth' => 'صافي الثروة الشخصية',
            'accomulative_saving_today' => 'اجمالي المدخرت حتى اليوم ',

        'current_asset_allocation' => 'تخصيص الأصول الحالية',
            'cash_and_equivalent' => 'النقد وما يعادله',
            'equities' => 'أسهم  ',
            'fix_income' => 'صكوك وسندات ',
            'alternative_investment' => 'إستثمارات بديلة ( عقارات/أراضي/ذهب وغيرها )',
            'total' => 'الاجمالي',


        'personal_indicators' => 'مؤشرات مالية شخصية ',
        'monthly_saving_rate' => 'معدل الادخار الشهري',

            'little_saver' => 'مدخر صغير',
            'good_saver' => 'مدخر جيد',
            'great_saver' => 'مدخر ممتاز',
            'rich_saver' => 'مدخر غني ',
            'wealthy_saver' => 'مدخر ثري ',
            
        'current_saving_amount' => 'إجمالي المدخرات حتى اليوم ',
            'poor_saver' => 'مدخر ضعيف ',
            'fair_saver' => 'مدخر جيد',

        'early_retirement_possibility' => 'احتمالية التقاعد المبكر ',
            'poor' => 'ضعيفة',
            'fair' => 'معقولة',
            'healthy' => 'جيدة ',
            'very_healthy' => 'ممتازة',
            'early_retire_person' => 'عالية ',
            
        'investing_diversity' => 'التنويع الاستثماري ',
            'good' => 'جيد ',
            'great' => 'عظيم ',


        'asset_allocation' => 'توزيع الاصول ',
        'risk_test_index' => 'اختبار تحمل المخاطر',
            'very_conservative' => 'مستثمر متحفظ جدا',
            'conservative' => 'مستثمر متحفظ',
            'natural' => 'مستثمر طبيعي ',
            'agressive' => 'مستثمر مغامر   ',
            'very_agressive' => 'مستثمر مغامر جدا',

        'recommended_assets_allocation' => 'توزيع الاصول الموصي به ',


        'financial_forecast' => 'التوقعات المالية المستقبلية ',

        'assumptions' => 'الأفتراضات الرئيسية',
            'monthly_saving_plan' => 'مبلغ الادخار ',
                'per_month' => '',
            'monthly_saving_today' => 'معدل الاخار',
                'of_monthly_income' => 'الشهري حاليا ',
            'accumulative_saving_today' => 'اجمالي المدخرت حتى اليوم ',
        'returns_assumptions' => 'إقتراضات العوائد السنوية ',
            'net_return_before_reitement' => 'صافي العوائد السنوية ( مرحلة ماقبل التقاعد ) ',
            'net_return_after_reitement' => 'صافي العوائد السنوية ( مرحلة مابعد التقاعد ) ',

        'income_and_wealth_at_retirement' => 'مبلغ الثروة والدخل عند التقاعد ',
            'retirement_plan_value_at' => 'قيمة خطة التقاعد عند التقاعد',
                'years_old' => 'بعمر  سنة ',
            'total_monthly_income' => 'اجمالي الدخل الشهري',
            'income_from_retirement_plan' => 'الدخل الشهري من المحفظة الاستثمارية ',
            'income_from_GOSI_or_PPA' => 'الدخل الشهري من التأمينات الاجتماعية / التقاعد ',
    ],

    'you' => 'أنت
',
];