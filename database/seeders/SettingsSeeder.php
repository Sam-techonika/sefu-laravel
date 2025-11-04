<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'site_name' => 'Sefu',
            'email' => 'info@example.com',
            'phone_number' => '(000) 000-0000',
            'whatsapp_number' => '+1234567890',
            'address' => '123 Business Street, City, Country',
            'ceo_name' => 'John Doe',
            'about_text' => 'We provide excellent insurance and financial services to help you secure your future.',
            'site_description' => 'Leading provider of insurance and financial services',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => 'text']
            );
        }
    }
}
