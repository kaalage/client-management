<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $this->clientService->storeClient($request);

        return redirect()->route('clients.index')->with('success', 'Cliente adicionado com sucesso!');
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $this->clientService->updateClient($request, $client);

        return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
