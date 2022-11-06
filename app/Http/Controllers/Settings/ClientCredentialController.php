<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateClientCredential;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class ClientCredentialController extends Controller
{
    public function index(ClientRepository $clientRepository)
    {
        $clients = $clientRepository->forUser(Auth::id());

        return Inertia::render('Settings/Tabs/ClientCredentials', [
            'clientCredentials' => $clients,
        ]);
    }

    public function store(CreateClientCredential $request, ClientRepository $clientRepository)
    {
        $client = $clientRepository->create(
            Auth::id(), $request->name, $request->get('uri') ?? ''
        );

        return Redirect::route('client-credential.index')->with('flash', [
            'success' => [
                'clientId' => $client->getAttribute('id'),
                'clientSecret' => $client->getAttribute('secret'),
            ],
        ]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return back(303);
    }
}
