<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\TestimonialTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Rashed Kabir',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'We\'ve 9,000 agents around the country, Find agents near your neighborhood. The service quality is exceptional and the team is very professional.',
                        'gender' => 'male',
                        'position' => 'Senior Designer',
                        'company' => 'Square Inc.',
                        'address' => 'USA'
                    ],
                    'hi' => [
                        'content' => 'देश भर में हमारे 9,000 एजेंट हैं, अपने आस-पास के क्षेत्र में एजेंट खोजें। सेवा की गुणवत्ता असाधारण है और टीम बहुत पेशेवर है।',
                        'gender' => 'male',
                        'position' => 'सीनियर डिज़ाइनर',
                        'company' => 'स्क्वायर इंक.',
                        'address' => 'अमेरिका'
                    ]
                ]
            ],
            [
                'name' => 'Hasan Mahmud',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'Commodo consequat. Duis aute irure dolor in reprehendert voluptate velit esse cillum dolore eu fugiat nulla. Excepteu sint occaecat cupidat non proident.',
                        'gender' => 'male',
                        'position' => 'Senior Developer',
                        'company' => 'Tech Solutions',
                        'address' => 'Canada'
                    ],
                    'hi' => [
                        'content' => 'कमोडो कॉन्सेक्वेट। दुइस ऑटे इरूरे डोलर इन रेप्रिहेंडेरिट वॉल्यूप्टेट वेलिट एस्से सिलम डोलोर इयू फ्यूजिएट नुला।',
                        'gender' => 'male',
                        'position' => 'सीनियर डेवलपर',
                        'company' => 'टेक सॉल्यूशंस',
                        'address' => 'कनाडा'
                    ]
                ]
            ],
            [
                'name' => 'Sarah Johnson',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint, cumque id! Nulla vero nam ipsa quae ut, ullam, ad repudiandae, tenetur facilis impedit velit maiores ipsum.',
                        'gender' => 'female',
                        'position' => 'Marketing Manager',
                        'company' => 'Digital Corp',
                        'address' => 'UK'
                    ],
                    'hi' => [
                        'content' => 'लोरेम इप्सम डोलर सिट अमेट कॉन्सेक्टेटुर एडिपिसिसिंग एलिट। सिंट, कमक्यू आईडी! नुला वेरो नाम इप्सा क्वे उत, उलम, एड रेप्यूडिएंडे।',
                        'gender' => 'female',
                        'position' => 'मार्केटिंग मैनेजर',
                        'company' => 'डिजिटल कॉर्प',
                        'address' => 'यूके'
                    ]
                ]
            ],
            [
                'name' => 'Martin Jonas',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'Ipsum consectetur around the country, Find agents near your neighborhood. The team delivered excellent results and exceeded our expectations.',
                        'gender' => 'male',
                        'position' => 'Project Manager',
                        'company' => 'Innovation Labs',
                        'address' => 'Germany'
                    ],
                    'hi' => [
                        'content' => 'इप्सम कॉन्सेक्टेटुर देश भर में, अपने आस-पास के क्षेत्र में एजेंट खोजें। टीम ने उत्कृष्ट परिणाम दिए और हमारी अपेक्षाओं से अधिक किया।',
                        'gender' => 'male',
                        'position' => 'प्रोजेक्ट मैनेजर',
                        'company' => 'इनोवेशन लैब्स',
                        'address' => 'जर्मनी'
                    ]
                ]
            ],
            [
                'name' => 'Emily Chen',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'Outstanding service and professional approach. The team was very responsive and delivered high-quality work within the timeline.',
                        'gender' => 'female',
                        'position' => 'CEO',
                        'company' => 'StartupTech',
                        'address' => 'Singapore'
                    ],
                    'hi' => [
                        'content' => 'उत्कृष्ट सेवा और पेशेवर दृष्टिकोण। टीम बहुत उत्तरदायी थी और समयसीमा के भीतर उच्च गुणवत्ता का काम दिया।',
                        'gender' => 'female',
                        'position' => 'सीईओ',
                        'company' => 'स्टार्टअपटेक',
                        'address' => 'सिंगापुर'
                    ]
                ]
            ]
        ];

        foreach ($testimonials as $testimonialData) {
            $translations = $testimonialData['translations'];
            unset($testimonialData['translations']);
            
            $testimonial = Testimonial::create($testimonialData);
            
            foreach ($translations as $locale => $translationData) {
                TestimonialTranslation::create([
                    'testimonial_id' => $testimonial->id,
                    'locale' => $locale,
                    ...$translationData
                ]);
            }
        }
    }
}
