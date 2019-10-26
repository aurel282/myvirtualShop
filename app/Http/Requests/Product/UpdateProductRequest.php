<?php

namespace App\Http\Requests\Product;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

	public function rules()
	{
        return [
            'name' => 'required|string|max:150',
            'quantity' => 'required|numeric',
            'description' => 'nullable|string|max:250',
            'price_per_unity' => 'required|numeric',
            'color' => 'nullable|string|max:150',
            'brand' => 'nullable|string|max:150',
            'material' => 'nullable|string|max:150',
        ];
    }

    /*
	public function rulesIfSet()
	{}


	public function messages()
	{}
    */
}
