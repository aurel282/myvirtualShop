<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClientRequest;
use App\Models\Database\Client;
use App\Service\AddressService;
use App\Service\ClientService;
use App\ValueObjects\AddressValueObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function getList(
        Request $request,
        ClientService $clientService
    )
    {
        $clients = $clientService->getList($request->all())
                ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function show(Client $client)
    {
        return view(
            'client.show',
            [
                'client' => $client,
            ]
        );
    }

    public function getCreate(Request $request)
    {
        return view(
            'client.create'
        );
    }

    public function postCreate(
        CreateClientRequest $request,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $address = $addressService->createAddress($addressValueObject);

        $clientService->createClient($request->all(), $address->id);


        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function getEdit(Client $client)
    {
        return view(
            'client.edit',
            [
                'client' => $client
            ]
        );
    }

    public function postEdit(
        CreateClientRequest $request,
        Client $client,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        $addressValueObject = new AddressValueObject($request->all()['address']);
        $addressService->editAddress($client->address, $addressValueObject);

        $clientService->editClient($client, $request->all());

        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }

    public function getImport()
    {
        return view(
            'import.clients'
        );
    }

    public function postImport(
        Request $request,
        ClientService $clientService,
        AddressService $addressService
    )
    {
        if ($request->input('submit') != null ){

            $file = $request->file('file');

            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileSize = $file->getSize();

            // Valid File Extensions
            $valid_extension = array("csv");

            // 2MB in Bytes
            $maxFileSize = 2097152;

            // Check file extension
            if(in_array(strtolower($extension),$valid_extension)){

                // Check file size
                if($fileSize <= $maxFileSize){

                    // File upload location
                    $location = 'uploads';

                    // Upload file
                    $file->move($location,$filename);

                    // Import CSV to Database
                    $filepath = public_path($location."/".$filename);

                    // Reading file
                    $file = fopen($filepath,"r");

                    $importData_arr = array();
                    $i = 0;

                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata );

                        // Skip first row (Remove below comment if you want to skip the first row)
                        /*if($i == 0){
                           $i++;
                           continue;
                        }*/
                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata [$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    // Insert to MySQL database
                    foreach($importData_arr as $importData){

                        $insertData = array(
                            "username"=>$importData[1],
                            "name"=>$importData[2],
                            "gender"=>$importData[3],
                            "email"=>$importData[4]);
                        Page::insertData($insertData);

                        $addressValueObject = new AddressValueObject([
                            'street' => $importData[1],
                            'number' => $importData[1],
                            'city' => $importData[1],
                            'country' => $importData[1],
                            'zip_code' => $importData[1],
                            ]);
                        $address = $addressService->createAddress($addressValueObject);

                        $clientService->createClient(
                            [
                                'lastname' => $importData[1],
                                'firstname' => $importData[1],
                                'email' => $importData[1],
                                'phone' => $importData[1],
                                'mobile' => $importData[1],
                            ], $address->id);



                    }

                    Session::flash('message','Import Successful.');
                }else{
                    Session::flash('message','File too large. File must be less than 2MB.');
                }

            }else{
                Session::flash('message','Invalid File Extension.');
            }
        }


        $clients = $clientService->getList([])
                                 ->paginate(15);

        return view(
            'client.list',
            [
                'clients' => $clients,
            ]
        );
    }
}
