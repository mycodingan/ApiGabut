<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoanControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    /** @test */
    public function authenticated_user_can_create_a_loan()
    {
        $user = \App\Models\User::factory()->create();

        $payload = [
            'amount' => 1500000,
            'notes' => 'Pinjam buat beli motor'
        ];

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/loan', $payload);

        $response->assertStatus(201);
        $this->assertStringContainsString('Pinjaman berhasil', $response->json('message'));

        $this->assertDatabaseHas('loans', [
            'user_id' => $user->id,
            'amount' => 1500000,
        ]);
    }


    /** @test */
    public function validation_error_when_amount_missing()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'sanctum')
            ->postJson('/api/loan', []); // kirim kosong

        $response->assertStatus(422)
            ->assertJsonValidationErrors('amount');
    }
}
