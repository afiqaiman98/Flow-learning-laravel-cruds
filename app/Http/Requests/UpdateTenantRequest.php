<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class UpdateTenantRequest extends FormRequest
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
            'name'=>'required',
            'email'=>[
                'email',
                'required',
                ValidationRule::unique('users')->ignore($this->tenant)
            
            ],
        'domain'=> [
            'required',
            'alpha_num',
            ValidationRule::unique('users')->ignore($this->tenant)
        ]
        ];
    }
}
