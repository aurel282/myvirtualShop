<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Setting extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'fixed_fee',
		'variable_fee',
	];
}
