<?php

namespace App\Http\Requests\Client;


use Illuminate\Foundation\Http\FormRequest;

class CreateClientRequest extends FormRequest
{

	public function rules()
	{
        return [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'email' => 'nullable|string|max:75',
            'language_code' => 'required|string|max:5',
            'phone_number' => 'nullable|string|max:15',
            'mobile_number' => 'nullable|string|max:15',
            'address.street' => 'nullable|string|max:150',
            'address.number' => 'nullable|numeric',
            'address.city' => 'nullable|string|max:50',
            'address.country' => 'nullable|string|max:50',
            'address.zip_code' => 'nullable|string|max:10',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
