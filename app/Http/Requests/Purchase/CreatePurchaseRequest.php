<?php

namespace App\Http\Requests\Purchase;


use Illuminate\Foundation\Http\FormRequest;

class CreatePurchaseRequest extends FormRequest
{

	public function rules()
	{
        return [
            'code' => 'required|string|max:13',
            'quantity' => 'required|numeric',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
