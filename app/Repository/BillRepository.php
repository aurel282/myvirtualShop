<?php

namespace App\Repository;


use App\Models\Database\Bill;
use App\Models\Database\Client;

class BillRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create(Client $client): Bill
    {
        return Bill::create([
            'date' => now(),
            'client_id' => $client->id,
            'isPaid' => false,
        ]);
    }

    public function updateIsPaid(bool $isPaid): bool
    {
        return Bill::update([
            'isPaid' => $isPaid,
        ]);
    }

}
