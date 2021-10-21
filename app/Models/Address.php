<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * App\Models\Database\Address
 *
 * @property int $id
 * @property string|null $street
 * @property string|null $number
 * @property string|null $zip_code
 * @property string|null $city
 * @property string|null $country
 * @property-read mixed $fully_readable
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereZipCode($value)
 */

class Address extends Eloquent
{
	const MAIN_COUNTRIES_KEY = [
		'FR' => 'FR',
		'BE' => 'BE',
		'NL' => 'NL',
		'LU' => 'LU',
		'ES' => 'ES',
		'DE' => 'DE',
		'IT' => 'IT',
		'GB' => 'GB',
	];

	public $timestamps = false;

	protected $fillable = [
		'street',
		'number',
		'zip',
		'city',
		'country'
	];

	/*
	public function contacts()
	{
		return $this->hasMany(Contact::class);
	}

	public function corporates()
	{
		return $this->hasMany(Corporate::class);
	}
	*/

	public function getFullyReadableAttribute(): string
	{
		$address = [
			$this->number . ', ' . $this->street,
			$this->zip_code . ' ' . $this->city,
			$this->country
		];
		return implode(PHP_EOL, $address);
	}

}
