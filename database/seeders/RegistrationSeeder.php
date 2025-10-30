<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\RegistrationPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $registrations = [
            [
                'name' => 'Company Registration For Locals',
                'plans' => ['Starter Plan', 'Compliance Plan', 'Complete Setup'],
            ],
            [
                'name' => 'Compare Plan Foreign National',
                'plans' => ['Starter Plan', 'Compliance Plan', 'Complete Setup'],
            ],
            [
                'name' => 'Trademark Registration',
                'plans' => ['Starter Plan', 'Compliance Plan', 'Complete Setup'],
            ],
        ];

        foreach ($registrations as $item) {
            $registration = Registration::create(['name' => $item['name']]);

            foreach ($item['plans'] as $planName) {
                RegistrationPlan::create([
                    'registration_id' => $registration->id,
                    'name' => $planName,
                ]);
            }
        }
    }
}
