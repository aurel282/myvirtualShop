<?php

namespace App\Http\Requests\Client;


use Illuminate\Foundation\Http\FormRequest;

class CreateProviderRequest extends FormRequest
{
	public function rules()
	{
        return [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'required|string|max:75',
            'language_code' => 'required|string|max:5',
            'phone_number' => 'string|max:15',
            'mobile_number' => 'string|max:15',
            'address.street' => 'required|string|max:150',
            'address.number' => 'required|numeric',
            'address.city' => 'required|string|max:50',
            'address.country' => 'required|string|max:50',
            'address.zip_code' => 'required|string|max:10',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
