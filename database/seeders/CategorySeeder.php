<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $categories = [
                [
                    'translations' => [
                        'en' => ['name' => 'Technology', 'description' => 'Latest technology trends and innovations'],
                        'hi' => ['name' => 'प्रौद्योगिकी', 'description' => 'नवीनतम प्रौद्योगिकी रुझान और नवाचार']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Web Development', 'description' => 'Web development tutorials and best practices'],
                        'hi' => ['name' => 'वेब डेवलपमेंट', 'description' => 'वेब डेवलपमेंट ट्यूटोरियल और बेहतरीन प्रथाएं']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Mobile Development', 'description' => 'Mobile app development guides and frameworks'],
                        'hi' => ['name' => 'मोबाइल डेवलपमेंट', 'description' => 'मोबाइल ऐप डेवलपमेंट गाइड और फ्रेमवर्क']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Artificial Intelligence', 'description' => 'AI, Machine Learning, and Deep Learning content'],
                        'hi' => ['name' => 'कृत्रिम बुद्धिमत्ता', 'description' => 'AI, मशीन लर्निंग, और डीप लर्निंग सामग्री']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Cybersecurity', 'description' => 'Security best practices and threat analysis'],
                        'hi' => ['name' => 'साइबर सुरक्षा', 'description' => 'सुरक्षा की बेहतरीन प्रथाएं और खतरा विश्लेषण']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Cloud Computing', 'description' => 'Cloud platforms, services, and deployment strategies'],
                        'hi' => ['name' => 'क्लाउड कंप्यूटिंग', 'description' => 'क्लाउड प्लेटफॉर्म, सेवाएं, और तैनाती रणनीतियां']
                    ]
                ]
            ];

            foreach ($categories as $categoryData) {
                $category = Category::create([]);

                foreach ($categoryData['translations'] as $locale => $translation) {
                    CategoryTranslation::create([
                        'category_id' => $category->id,
                        'locale' => $locale,
                        'name' => $translation['name']
                    ]);
                }
            }
        });
    }
}