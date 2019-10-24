<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{

	public $timestamps = false;

	protected $fillable = [
		'name',
		'description',
        'provider_id',
        'quantity',
        'price_per_unity',
        'color',
        'brand',
        'material',
        'code'
	];


	public function provider()
	{
		return $this->belongsTo(Provider::class);
	}

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

}
