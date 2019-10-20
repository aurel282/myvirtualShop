<?php

namespace App\Service;

use App\Models\Database\Provider;
use App\Repository\AddressRepository;
use App\Repository\ProviderRepository;
use Illuminate\Database\Eloquent\Builder;

class ProviderService extends AbstractService
{
    /**
     * @var ProviderRepository
     */
    protected $_providerRepository;

    /**
     * @var AddressRepository
     */
    protected $_addressRepository;

    public function __construct(
        ProviderRepository $providerRepository,
        AddressRepository $addressRepository
    )
    {
        parent::__construct();
        $this->_providerRepository = $providerRepository;
        $this->_addressRepository = $addressRepository;
    }

    public function getList(): Builder
    {
        return $this->_providerRepository->getProviderList();
    }

    public function getProvider(int $id) : Provider
    {
        return new Provider();
    }

    public function editProvider(Provider $provider, array $request): bool
    {
        return $this->_providerRepository->edit($provider, $request);
    }

    /**
     * @param array $request
     * @param int   $addressId
     *
     * @return Provider
     */
    public function createProvider(array $request, int $addressId): Provider
    {
        return $this->_providerRepository->create($request, $addressId);
    }

    /**
     * @param Provider $provider
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteProvider(Provider $provider) : bool
    {
        $address = $provider->address;
        return ($this->_providerRepository->delete($provider) && $this->_addressRepository->delete($address));
    }
}
