<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Client
 *
 *  @property int $address_id
 *
 * @property-read Address|null $address
 * @package App\Models\Database
 */
class Client extends Eloquent
{

	public $timestamps = false;

    protected $casts = [
        'address_id' => 'int'
    ];


	protected $fillable = [
		'name',
		'firstname',
		'phone',
		'email',
        'address_id'
	];


	public function address()
	{
		return $this->belongsTo(Address::class);
	}

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
    /*
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
