<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name'=>'required|string',
            'customer_phone'=>'regex:/^09[0-9]{8}/',
            'description' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required' => '顧客名稱不得為空!',
            'customer_phone.regex'=> '顧客聯絡方式格式不正確',
            'description.required' => '損壞描述不得為空！'
        ];
    }
}
