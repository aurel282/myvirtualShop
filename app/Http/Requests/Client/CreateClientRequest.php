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
            'email' => 'required|string|max:75',
            'language' => 'required|string|max:5',
            'phone_prefix' => 'required|string|max:5',
            'mobile_prefix' => 'required|string|max:5',
            'phone_number' => 'required|numeric',
            'mobile_number' => 'required|numeric',
            'address.street' => 'required|string|max:150',
            'address.number' => 'required|numeric',
            'address.city' => 'required|string|max:50',
            'address.country' => 'required|string|max:50',
        ];
    }

	public function rulesIfSet()
	{}


	public function messages()
	{}
}
