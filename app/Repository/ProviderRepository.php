<?php

namespace App\Repository;

use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Database\Client;
use App\Models\Database\Provider;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class ProviderRepository extends AbstractRepository
{
    /**
     * ClientRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function  getProviderList(): Builder
    {
        return Provider::query();
    }

    /**
     * @param array $request
     * @param int   $addressId
     *
     * @return Provider
     */
    public function create(array $request, int $addressId): Provider
    {
        return Provider::create([
            'name' => $request['lastname'],
            'firstname' => $request['firstname'],
            'email' => $request['email'],
            'phone' => $request['phone_number'],
            'mobile' => $request['mobile_number'],
            'address_id' => $addressId,
        ]);
    }

    /**
     * @param Provider              $provider
     * @param array $request
     * @param int                 $addressId
     *
     * @return bool
     */
    public function  edit(Provider $provider, array $request): bool
    {
        return $provider->update([
            'name' => $request['lastname'],
            'firstname' => $request['firstname'],
            'email' => $request['email'],
            'phone' => $request['phone_number'],
            'mobile' =>  $request['mobile_number']
        ]);
    }

    /**
     * @param Provider              $provider
     *
     * @return bool
     * @throws \Exception
     */
    public function  delete(Provider $provider): bool
    {
        return $provider->delete();
    }
}
