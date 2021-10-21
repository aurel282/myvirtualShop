<?php

namespace App\Models;

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
		return $this->belongsTo(Product::class);
	}


    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

}
