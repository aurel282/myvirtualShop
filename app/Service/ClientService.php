<?php

namespace App\Service;

use App\Http\Requests\Client\CreateClientRequest;
use App\Models\Database\Client;
use App\Repository\ClientRepository;
use App\Repository\AddressRepository;
use Illuminate\Database\Eloquent\Builder;

class ClientService extends AbstractService
{

    /**
     * @var ClientRepository
     */
    protected $_clientRepository;

    /**
     * @var AddressRepository
     */
    protected $_addressRepository;

    public function __construct(
        ClientRepository $clientRepository,
        AddressRepository $addressRepository
    )
    {
        parent::__construct();
        $this->_clientRepository = $clientRepository;
        $this->_addressRepository = $addressRepository;
    }

    public function getList(): Builder
    {
        return $this->_clientRepository->getClientList();
    }

    public function getClient(int $id) : Client
    {
        return new Client();
    }

    public function editClient(Client $client, array $request): bool
    {
        return $this->_clientRepository->edit($client, $request);
    }

    /**
     * @param array $request
     * @param int   $addressId
     *
     * @return Client
     */
    public function createClient(array $request, int $addressId): Client
    {
        return $this->_clientRepository->create($request, $addressId);
    }

    /**
     * @param Client $client
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteClient(Client $client) : bool
    {
        $address = $client->address;
        return ($this->_clientRepository->delete($client) && $this->_addressRepository->delete($address));
    }
}
