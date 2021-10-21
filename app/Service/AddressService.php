<?php

namespace App\Service;


use App\Models\Address;
use App\Repository\AddressRepository;
use App\ValueObjects\AddressValueObject;

class AddressService extends AbstractService
{
    /**
     * @var AddressRepository
     */
    protected $_addressRepository;

    public function __construct(
        AddressRepository $addressRepository
    )
    {
        parent::__construct();
        $this->_addressRepository = $addressRepository;
    }

    public function getAddress(int $id) : Address
    {
        return new Address();
    }

    public function editAddress(Address $address, AddressValueObject $request): bool
    {
        return $this->_addressRepository->edit($address, $request);
    }

    /**
     * @param AddressValueObject $request
     *
     * @return Address
     */
    public function createAddress(AddressValueObject $request): Address
    {
        return $this->_addressRepository->create($request);
    }

    /**
     * @param Address $address
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteAddress(Address $address) : bool
    {
        return ($this->_addressRepository->delete($address));
    }
}
