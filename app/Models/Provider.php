<?php

namespace App\Models\Database;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Provider
 *
 *  @property int $address_id
 *
 * @property-read Address|null $address
 * @package App\Models\Database
 */
class Provider extends Eloquent
{

    public $timestamps = false;

    protected $casts = [
        'address_id' => 'int'
    ];


    protected $fillable = [
        'name',
        'firstname',
        'phone',
        'mobile',
        'email',
        'address_id'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function number_products()
    {
        return count($this->products()->get());
    }
    /*
        public function corporates()
        {
            return $this->hasMany(Corporate::class);
        }
        */


}
