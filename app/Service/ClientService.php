<?php

namespace App\Service;

use App\Repository\ClientRepository;
use Illuminate\Database\Eloquent\Builder;

class ClientService extends AbstractService
{

    /**
     * @var ClientRepository
     */
    protected $_clientRepository;

    public function __construct(
        ClientRepository $clientRepository
    )
    {
        parent::__construct();
        $this->_clientRepository = $clientRepository;
    }

    public function getList(): Builder
    {
        return $this->_clientRepository->getClientList();
    }

    public function getClient(int $id)
    {

    }

    public function editClient()
    {

    }

    public function deleteClient()
    {

    }

    public function createClient()
    {

    }
}
