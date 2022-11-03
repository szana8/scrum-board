<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateClientCredential;
use Auth;
use Inertia\Inertia;
use Laravel\Passport\Client;
use Laravel\Passport\ClientRepository;

class ClientCredentialController extends Controller
{
    public function index(ClientRepository $clientRepository)
    {
        $clients = $clientRepository->forUser(Auth::id());
        return Inertia::render('Settings/ClientCredentials', [
            'clientCredentials' => $clients,
        ]);
    }

    public function store(CreateClientCredential $request, ClientRepository $clientRepository)
    {
        $client = $clientRepository->create(
            Auth::id(), $request->name, $request->get('uri') ?? ''
        );

        return Inertia::dialog('Dialogs/Settings/NewClientCredentialModal', [
            'clientId' => $client->getAttribute('id'),
            'clientSecret' => $client->getAttribute('secret'),
        ])->baseRoute('client-credential.index')->basePageRoute('client-credential.index');
    }

    public function popup($clientId)
    {
        return Inertia::dialog('Dialogs/Settings/ConfirmClientCredentialDeleteModal',[
            'clientId' => $clientId,
        ])->baseRoute('client-credential.index')->basePageRoute('client-credential.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return back(303);
    }
}
