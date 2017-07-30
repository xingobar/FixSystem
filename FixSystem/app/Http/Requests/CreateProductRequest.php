<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CreateProductRequest extends FormRequest
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
            'name'=>'required|string',
            'model'=> 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'名稱欄位不得為空!',
            'model.required'=>'型號欄位不得為空！'
        ];
    }
}
