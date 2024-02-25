<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Allergy;
use App\Models\Condition;
use App\Models\Medication;
use App\Models\NextOfKin;
use App\Models\Patient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PatientsControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_should_return_all_patients()
    {
        $patient = Patient::factory()->create();
        NextOfKin::factory(2)->create(['patient_id' => $patient->id]);
        Condition::factory(1)->create(['patient_id' => $patient->id]);
        Allergy::factory(1)->create(['patient_id' => $patient->id]);
        Medication::factory(2)->create(['patient_id' => $patient->id]);

        $response = $this->json('GET', '/api/patients');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'current_page',
                    'data' => [
                        '*' => [
                            'Id',
                            'IdCard',
                            'Gender',
                            'Name',
                            'Surname',
                            'DateOfBirth',
                            'Address',
                            'Postcode',
                            'ContactNumber1',
                            'ContactNumber2',
                            'NextOfKin',
                            'Medical' => [
                                'Conditions',
                                'Allergies',
                                'Medications',
                            ],
                        ],
                    ],
                ],
            ]);
    }

    /**
     * @test
     */
    public function it_should_return_patient_details()
    {
        $patient = Patient::factory()->create();

        $response = $this->json('GET', "/api/patients/{$patient->id_card}");

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'Id' => $patient->id,
                    'IdCard' => $patient->id_card,
                    'Gender' => $patient->gender,
                    'Name' => $patient->name,
                    'Surname' => $patient->surname,
                    'DateOfBirth' => $patient->date_of_birth,
                    'Address' => $patient->address,
                    'Postcode' => $patient->post_code,
                    'ContactNumber1' => $patient->contact_number_one,
                    'ContactNumber2' => $patient->contact_number_two,
                    'NextOfKin' => [],
                    'Medical' => [
                        'Conditions' => [],
                        'Allergies' => [],
                        'Medications' => [],
                    ],
                ],
            ]);
    }

    /**
     * @test
     */
    public function it_should_store_patient_to_database()
    {
        $data = [
            'id_card' => $this->faker->unique()->bothify('????#####'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'contact_number_one' => $this->faker->phoneNumber,
            'contact_number_two' => $this->faker->phoneNumber,
        ];

        $response = $this->json('POST', '/api/patients', $data);

        $response
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'Id',
                    'IdCard',
                    'Gender',
                    'Name',
                    'Surname',
                    'DateOfBirth',
                    'Address',
                    'Postcode',
                    'ContactNumber1',
                    'ContactNumber2',
                ],
            ]);

        $this->assertDatabaseHas('patients', [
            'id_card' => $data['id_card'],
            'gender' => $data['gender'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'date_of_birth' => $data['date_of_birth'],
            'address' => $data['address'],
            'post_code' => $data['post_code'],
            'contact_number_one' => $data['contact_number_one'],
            'contact_number_two' => $data['contact_number_two'],
        ]);
    }

    /**
     * @test
     */
    public function it_should_update_patient_data()
    {
        $patient = Patient::factory()->create();
        $data = [
            'name' => 'Updated Name',
            'id_card' => $patient->id_card,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'surname' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address,
            'post_code' => $this->faker->postcode,
            'contact_number_one' => $this->faker->phoneNumber,
            'contact_number_two' => $this->faker->phoneNumber,
        ];

        $response = $this->json('PUT', "/api/patients/{$patient->id}", $data);

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'Id',
                    'IdCard',
                    'Gender',
                    'Name',
                    'Surname',
                    'DateOfBirth',
                    'Address',
                    'Postcode',
                    'ContactNumber1',
                    'ContactNumber2',
                ],
            ]);

        $this->assertDatabaseHas('patients', [
            'id' => $patient->id,
            'name' => 'Updated Name',
        ]);
    }

    /**
     * @test
     */
    public function it_should_delete_patient_from_database()
    {
        $patient = Patient::factory()->create();

        $response = $this->json('DELETE', "/api/patients/{$patient->id}");

        $response->assertStatus(204);

        $this->assertSoftDeleted('patients', [
            'id' => $patient->id,
        ]);
    }
}
