<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_clients_index()
    {
        $clients = Client::factory()->count(3)->create();

        $response = $this->get('/clients');

        $response->assertStatus(200);
        $response->assertViewHas('clients', $clients);
    }

    public function test_client_can_be_created()
    {
        Storage::fake('public');

        $photo = UploadedFile::fake()->image('photo.jpg');

        $response = $this->post('/clients', [
            'name' => 'Test Client',
            'email' => 'testclient@example.com',
            'phone' => '1234567890',
            'photo' => $photo,
        ]);

        $response->assertRedirect('/clients');
        $this->assertDatabaseHas('clients', [
            'name' => 'Test Client',
            'email' => 'testclient@example.com',
            'phone' => '1234567890',
        ]);

        Storage::disk('public')->assertExists('photos/' . $photo->hashName());
    }

    public function test_client_can_be_updated()
    {
        Storage::fake('public');

        $client = Client::factory()->create();

        $updatedPhoto = UploadedFile::fake()->image('updatedphoto.jpg');

        $response = $this->put("/clients/{$client->id}", [
            'name' => 'Updated Client',
            'email' => 'updatedclient@example.com',
            'phone' => '0987654321',
            'photo' => $updatedPhoto,
        ]);

        $response->assertRedirect('/clients');
        $this->assertDatabaseHas('clients', [
            'id' => $client->id,
            'name' => 'Updated Client',
            'email' => 'updatedclient@example.com',
            'phone' => '0987654321',
        ]);

        Storage::disk('public')->assertExists('photos/' . $updatedPhoto->hashName());
    }

    public function test_client_can_be_deleted()
    {
        $client = Client::factory()->create();

        $response = $this->delete("/clients/{$client->id}");

        $response->assertRedirect('/clients');
        $this->assertDatabaseMissing('clients', [
            'id' => $client->id,
        ]);
    }
}
