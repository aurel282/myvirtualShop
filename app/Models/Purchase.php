<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Purchase extends Eloquent
{

	public $timestamps = false;

	protected $fillable = [
		'product_id',
		'bill_id',
		'quantity',
	];


	public function product()
	{
		return $this->hasOne(Product::class);
	}


    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

}