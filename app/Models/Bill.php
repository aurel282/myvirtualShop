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



}
