<?php

namespace App\Repository;

use App\Models\Address;
use App\ValueObjects\AddressValueObject;

class AddressRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param AddressValueObject $request
     *
     * @return Address
     */
    public function  create(AddressValueObject $request): Address
    {
        return Address::create([
            'street' => $request->getStreet(),
            'number' => $request->getNumber(),
            'city' => $request->getCity(),
            'zip' => $request->getZipCode(),
            'country' => $request->getCountry(),
        ]);
    }

    /**
     * @param Address              $address
     * @param AddressValueObject $request
     *
     * @return bool
     */
    public function  edit(Address $address, AddressValueObject $request): bool
    {
        return $address->update([
            'street' => $request->getStreet(),
            'number' => $request->getNumber(),
            'city' => $request->getCity(),
            'zip' => $request->getZipCode(),
            'country' => $request->getCountry(),
        ]);
    }

    /**
     * @param Address              $address
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(Address $address): bool
    {
        return $address->delete();
    }
}
