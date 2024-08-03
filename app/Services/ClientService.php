<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientService
{
    public function storeClient(Request $request)
    {
        Log::info('Store method called');
        Log::info('Request data: ', $request->all());

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        $client = new Client();
        $client->fill($validatedData);

        if ($request->hasFile('photo')) {
            $client->photo = $request->file('photo')->store('photos', 'public');
        }

        if ($client->save()) {
            Log::info('Client saved successfully');
        } else {
            Log::error('Failed to save client');
        }

        return $client;
    }

    public function updateClient(Request $request, Client $client)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
            'phone' => 'required|string|max:15',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $client->update($validatedData);

        return $client;
    }
}
