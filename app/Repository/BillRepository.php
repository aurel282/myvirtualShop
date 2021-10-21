<?php

namespace App\Repository;


use App\Models\Bill;
use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;

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

    public function  getList(): Builder
    {
        return Bill::query();
    }


}
