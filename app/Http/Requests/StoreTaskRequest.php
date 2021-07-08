<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
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
            'name' => 'required|min:6|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Trường name là bắt buộc',
            'name.min' => 'Trường name không được dưới 6 ký tự',
            'name.max' => 'Trường name không được vượt quá 255 ký tự',
        ];
    }
}
