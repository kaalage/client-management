<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        Log::info('Store method called');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $client->photo = $path;
        }

        if ($client->save()) {
            Log::info('Client saved successfully');
        } else {
            Log::error('Failed to save client');
        }

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
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:clients,email,' . $client->id,
        'phone' => 'required|string|max:20',
        'photo' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('photo')) {
        $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
    }

    $client->update($validatedData);

    return redirect()->route('clients.index')->with('success', 'Cliente atualizado com sucesso!');
}


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
