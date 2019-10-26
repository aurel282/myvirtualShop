<?php

namespace App\Http\Requests\Settings;


use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{

	public function rules()
	{
        return [
            'fixed_fee' => 'required|numeric',
            'variable_fee' => 'required|numeric',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
