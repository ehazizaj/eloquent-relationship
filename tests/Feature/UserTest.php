<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteUserWithDetails()
    {
        $user = User::factory()->create();

        $country = Country::factory()->create([
            "name" => "Austria",
            "iso2" => "AU",
            "iso3" => "AUT",
        ]);

        $details = UserDetail::factory()->create([
            "user_id" => $user->id,
            "citizenship_country_id" => $country->id,
            "first_name" =>'Erjon',
            "last_name" => "Hazizaj",
            "phone_number" => "0695207911"
        ]);
        $this->json('DELETE', 'api/user/' . $user->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDeleteUserWithoutDetails()
    {
        $user = User::factory()->create();

        $this->json('DELETE', 'api/user/' . $user->id, [], ['Accept' => 'application/json'])
            ->assertStatus(200);
    }

}
