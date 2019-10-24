<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;



class Bill extends Eloquent
{


	public $timestamps = false;

	protected $fillable = [
		'date',
		'client_id',
		'isPaid',
	];

	public function client()
	{
		return $this->hasOne(Client::class);
	}

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function total_price() : float
    {
        $purchases = $this->purchases()->get();
        /** var int */
        $total = 0;
        foreach ($purchases as $purchase)
        {
            $total += $purchase->product->price_per_unity * $purchase->quantity;
        }
        return $total;
    }

    public function number_product()
    {
        return count($this->hasMany(Purchase::class)->get());

    }
}
