<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\TestimonialTranslation;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [

            // 1
            [
                'name' => 'Adv. Rohan Mehta',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'The legal team provided clear guidance on my case and handled everything with professionalism. Their attention to detail and timely updates made the entire process stress-free.',
                        'gender' => 'male',
                        'position' => 'Senior Advocate',
                        'company' => 'Mehta Legal Associates',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'कानूनी टीम ने मेरे मामले पर स्पष्ट मार्गदर्शन दिया और हर चीज़ को पेशेवर तरीके से संभाला। उनकी बारीकी से जांच और समय पर अपडेट ने पूरी प्रक्रिया को तनाव-मुक्त बना दिया।',
                        'gender' => 'male',
                        'position' => 'सीनियर एडवोकेट',
                        'company' => 'मेहता लीगल एसोसिएट्स',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 2
            [
                'name' => 'Priya Sharma',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'I needed a reliable lawyer for a property dispute and found exactly what I was looking for. The firm explained every step clearly and represented me confidently in court.',
                        'gender' => 'female',
                        'position' => 'Client',
                        'company' => 'Property Legal Support',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'मुझे प्रॉपर्टी विवाद के लिए एक भरोसेमंद वकील की आवश्यकता थी और मुझे यहाँ बिल्कुल वही मिला। फर्म ने हर चरण को स्पष्ट रूप से समझाया और अदालत में आत्मविश्वास के साथ मेरा प्रतिनिधित्व किया।',
                        'gender' => 'female',
                        'position' => 'क्लाइंट',
                        'company' => 'प्रॉपर्टी लीगल सपोर्ट',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 3
            [
                'name' => 'Arvind Kumar',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'I was struggling with business compliance issues, and the legal experts resolved everything smoothly. Their advice helped me avoid penalties and operate my business legally.',
                        'gender' => 'male',
                        'position' => 'Business Owner',
                        'company' => 'Kumar Industries',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'मैं व्यवसाय अनुपालन मुद्दों से परेशान था, लेकिन कानूनी विशेषज्ञों ने सब कुछ आसानी से हल कर दिया। उनकी सलाह ने मुझे दंड से बचने और अपने व्यवसाय को कानूनी रूप से चलाने में मदद की।',
                        'gender' => 'male',
                        'position' => 'व्यवसायी',
                        'company' => 'कुमार इंडस्ट्रीज़',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 4
            [
                'name' => 'Neha Gupta',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'Their team helped me draft legal agreements with accuracy and explained every clause in simple language. The overall experience was extremely smooth.',
                        'gender' => 'female',
                        'position' => 'Startup Founder',
                        'company' => 'InnovateX',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'टीम ने मुझे कानूनी एग्रीमेंट सटीकता के साथ तैयार करने में मदद की और हर क्लॉज़ को सरल भाषा में समझाया। पूरा अनुभव बेहद आसान था।',
                        'gender' => 'female',
                        'position' => 'स्टार्टअप फाउंडर',
                        'company' => 'इननोवेटएक्स',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 5
            [
                'name' => 'Jonathan Lee',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'Excellent legal consultation experience. They understood my corporate issue and provided practical and effective solutions. Highly recommended.',
                        'gender' => 'male',
                        'position' => 'Corporate Executive',
                        'company' => 'Global Tech Corp',
                        'address' => 'Singapore'
                    ],
                    'hi' => [
                        'content' => 'बेहतरीन कानूनी परामर्श अनुभव। उन्होंने मेरी कॉर्पोरेट समस्या को समझा और व्यावहारिक तथा प्रभावी समाधान दिए। अत्यधिक अनुशंसित।',
                        'gender' => 'male',
                        'position' => 'कॉर्पोरेट एग्जीक्यूटिव',
                        'company' => 'ग्लोबल टेक कॉर्प',
                        'address' => 'सिंगापुर'
                    ]
                ]
            ],

            // 6
            [
                'name' => 'Adv. Sunita Verma',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'Their knowledge of family law is impressive. I received the best advice during my divorce case, and the entire process was handled with sensitivity and professionalism.',
                        'gender' => 'female',
                        'position' => 'Family Lawyer',
                        'company' => 'Verma & Associates',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'परिवार कानून में उनकी जानकारी प्रभावशाली है। मुझे अपने तलाक मामले के दौरान बेहतरीन सलाह मिली और पूरी प्रक्रिया को संवेदनशीलता और पेशेवर तरीके से संभाला गया।',
                        'gender' => 'female',
                        'position' => 'फैमिली लॉयर',
                        'company' => 'वर्मा एंड एसोसिएट्स',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 7
            [
                'name' => 'Rahul Raj',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'The attorneys helped me with criminal case documentation and ensured everything was filed correctly. Their confidence and expertise gave me peace of mind.',
                        'gender' => 'male',
                        'position' => 'Client',
                        'company' => 'Legal Support Desk',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'वकीलों ने मेरे आपराधिक मामले से संबंधित दस्तावेज तैयार करने में मदद की और सुनिश्चित किया कि सब कुछ सही ढंग से दाखिल हो। उनके आत्मविश्वास और विशेषज्ञता ने मुझे सुकून दिया।',
                        'gender' => 'male',
                        'position' => 'क्लाइंट',
                        'company' => 'लीगल सपोर्ट डेस्क',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 8
            [
                'name' => 'Dr. Sophia Williams',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'I consulted them regarding medical liability issues. Their thorough research and structured approach helped me protect my professional rights.',
                        'gender' => 'female',
                        'position' => 'Doctor',
                        'company' => 'City Health Clinic',
                        'address' => 'UK'
                    ],
                    'hi' => [
                        'content' => 'मैंने मेडिकल लाइबिलिटी मुद्दों के संबंध में उनसे सलाह ली। उनके विस्तृत शोध और व्यवस्थित दृष्टिकोण ने मेरे पेशेवर अधिकारों की रक्षा करने में मदद की।',
                        'gender' => 'female',
                        'position' => 'डॉक्टर',
                        'company' => 'सिटी हेल्थ क्लिनिक',
                        'address' => 'यूके'
                    ]
                ]
            ],

            // 9
            [
                'name' => 'Aman Khan',
                'is_active' => true,
                'is_homepage' => false,
                'translations' => [
                    'en' => [
                        'content' => 'Their team represented me in an employment dispute. The clarity in documentation and the strong presentation in front of the tribunal helped me win my case.',
                        'gender' => 'male',
                        'position' => 'Software Engineer',
                        'company' => 'IT Solutions Ltd.',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'टीम ने रोजगार विवाद में मेरा प्रतिनिधित्व किया। दस्तावेजों में स्पष्टता और ट्रिब्यूनल के सामने मजबूत प्रस्तुति ने मुझे अपना मामला जीतने में मदद की।',
                        'gender' => 'male',
                        'position' => 'सॉफ्टवेयर इंजीनियर',
                        'company' => 'आईटी सॉल्यूशंस लिमिटेड',
                        'address' => 'भारत'
                    ]
                ]
            ],

            // 10
            [
                'name' => 'Adv. Meenal Kapoor',
                'is_active' => true,
                'is_homepage' => true,
                'translations' => [
                    'en' => [
                        'content' => 'A highly professional legal firm. They helped me with trademark registration and ensured seamless filing without any errors. Excellent support!',
                        'gender' => 'female',
                        'position' => 'IP Attorney',
                        'company' => 'Kapoor Legal Chambers',
                        'address' => 'India'
                    ],
                    'hi' => [
                        'content' => 'एक अत्यंत पेशेवर कानूनी फर्म। उन्होंने ट्रेडमार्क पंजीकरण में मेरी मदद की और बिना किसी त्रुटि के सुचारू फाइलिंग सुनिश्चित की। उत्कृष्ट समर्थन!',
                        'gender' => 'female',
                        'position' => 'आईपी अटॉर्नी',
                        'company' => 'कपूर लीगल चेम्बर्स',
                        'address' => 'भारत'
                    ]
                ]
            ],

        ];

        // Save all testimonials + translations
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
