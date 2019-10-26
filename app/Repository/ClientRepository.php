<?php

namespace App\Repository;

use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
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


    public function  getClientList(array $searchInfo): Builder
    {
        $query = Client::query();
        if (isset($searchInfo['client_name']))
        {
            $query->where('name', 'like', '%' . $searchInfo['client_name'] . '%' );
        }

        if (isset($searchInfo['client_id']))
        {
            $query->where('id', $searchInfo['client_id'] );
        }

        return $query;
    }

    public function create(array $request, int $addressId): Client
    {
        return Client::create([
            'name' => $request['lastname'],
            'firstname' => $request['firstname'],
            'email' => isset($request['email']) ?  $request['email'] : '',
            'phone' => isset($request['phone_number']) ? $request['phone_number'] : '',
            'mobile' => isset($request['mobile_number']) ? $request['mobile_number'] : '',
            'address_id' => $addressId,
        ]);
    }

    /**
     * @param Client              $client
     * @param array $request
     *
     * @return bool
     */
    public function  edit(Client $client, array $request): bool
    {
        return $client->update([
            'name' => $request['lastname'],
            'firstname' => $request['firstname'],
            'email' => isset($request['email']) ?  $request['email'] : '',
            'phone' => isset($request['phone_number']) ? $request['phone_number'] : '',
            'mobile' => isset($request['mobile_number']) ? $request['mobile_number'] : '',
        ]);
    }

    /**
     * @param Client              $client
     *
     * @return bool
     * @throws \Exception
     */
    public function  delete(Client $client): bool
    {
        return $client->delete();
    }
}
