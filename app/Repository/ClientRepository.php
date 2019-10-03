<?php

namespace App\Repository;

use App\Models\Database\Client;
use Illuminate\Database\Eloquent\Builder;
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


    public function  getClientList(): Builder
    {
        return Client::query();
    }
}
