<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProgressTimeRequest extends FormRequest
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
            'work_start'=>'required|date_format:"Y-m-d H:i"',
            'work_end'=>'required|date_format:"Y-m-d H:i"',
            'departure_time'=>'required|date_format:"Y-m-d H:i"',
            'arrival_time'=>'required|date_format:"Y-m-d H:i"',
            'handle_description'=>'required|string'
        ];
    }

    public function messages(){
        return [
            'handle_description.required'=>'處理描述欄位不得為空'
        ];
    }
}
