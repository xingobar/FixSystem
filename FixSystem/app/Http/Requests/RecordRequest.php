<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class RecordRequest extends FormRequest
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
            'customer_name' => 'required|string',
            'customer_phone'=>'regex:/^09[0-9]{8}/'
        ];
    }

    public function messages()
    {
        return[
           'customer_name.required'=>'顧客姓名欄位不得為空',
           'customer_phone.regex'=>'顧客聯絡方式格式不正確'  
        ];
    }
}
