<?php

namespace App\Repository\Parking;

use App\Models\Database\Client;
use App\Repository\AbstractRepository;
use Illuminate\Support\Collection;

class ClientRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function  getAllClient(): Collection
    {
        return Client::query()->get();
    }
}
