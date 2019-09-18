<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateUserRequest extends FormRequest
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
            // 'name' => 'required|min:2|max:20|unique:users',
            'name' => [
                'required','min:2','max:30',
                // ignore(id)排除自身，以id识别。这里获取当前路由参数user，也可以传入用户的实例
                Rule::unique('users')->ignore($this->route('user')),
                
            ],
            'password' => 'nullable|confirmed|min:6'
        ];
    }
}
