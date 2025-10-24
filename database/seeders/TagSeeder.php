<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\TagTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $tags = [
                [
                    'translations' => [
                        'en' => ['name' => 'Laravel'],
                        'hi' => ['name' => 'लारावेल']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'PHP'],
                        'hi' => ['name' => 'पीएचपी']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'JavaScript'],
                        'hi' => ['name' => 'जावास्क्रिप्ट']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'React'],
                        'hi' => ['name' => 'रिएक्ट']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Vue.js'],
                        'hi' => ['name' => 'व्यू.जेएस']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Node.js'],
                        'hi' => ['name' => 'नोड.जेएस']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Python'],
                        'hi' => ['name' => 'पायथन']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Machine Learning'],
                        'hi' => ['name' => 'मशीन लर्निंग']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'API'],
                        'hi' => ['name' => 'एपीआई']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Database'],
                        'hi' => ['name' => 'डेटाबेस']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'MySQL'],
                        'hi' => ['name' => 'माईएसक्यूएल']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'AWS'],
                        'hi' => ['name' => 'एडब्ल्यूएस']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Docker'],
                        'hi' => ['name' => 'डॉकर']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Tutorial'],
                        'hi' => ['name' => 'ट्यूटोरियल']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Beginner'],
                        'hi' => ['name' => 'शुरुआती']
                    ]
                ],
                [
                    'translations' => [
                        'en' => ['name' => 'Advanced'],
                        'hi' => ['name' => 'उन्नत']
                    ]
                ]
            ];

            foreach ($tags as $tagData) {
                $tag = Tag::create([]);

                foreach ($tagData['translations'] as $locale => $translation) {
                    TagTranslation::create([
                        'tag_id' => $tag->id,
                        'locale' => $locale,
                        'name' => $translation['name']
                    ]);
                }
            }
        });
    }
}