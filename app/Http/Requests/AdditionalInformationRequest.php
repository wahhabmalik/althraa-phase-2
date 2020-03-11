<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // extra_info
            'extra_info' => 'required|array',

            'extra_info.monthly_contributions_year_1' => 'required|numeric',
            'extra_info.annual_increase_in_contributions_percentage' => 'required|numeric',
            'extra_info.withdrawl_amount_per_month' => 'required|numeric',
        ];
    }


    public function attributes()
    {

        return [
            // extra_info
            'extra_info' => 'Extra Information',

            'extra_info.monthly_contributions_year_1' => trans('lang.question.monthly_contributions_year_1'),
            'extra_info.annual_increase_in_contributions_percentage' => trans('lang.question.annual_increase_in_contributions_percentage'),
            'extra_info.withdrawl_amount_per_month' => trans('lang.question.withdrawl_amount_per_month'),
        ];
    }
}
