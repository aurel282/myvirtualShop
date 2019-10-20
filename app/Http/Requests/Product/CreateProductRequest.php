<?php

namespace App\Http\Requests\Product;


use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
	public function rules()
	{
        return [
            'name' => 'required|string|max:150',
            'quantity' => 'required|numeric',
            'description' => 'string|max:250',
            'price_per_unity' => 'required|numeric',
            'color' => 'string|max:150',
            'brand' => 'string|max:150',
            'material' => 'string|max:150',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
