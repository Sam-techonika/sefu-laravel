<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\FaqTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $faqs = [
                [
                    'is_homepage' => true,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'How does the affiliate program work?',
                            'answer' => 'Our affiliate program allows you to earn commissions by referring new customers to our services. You will receive a unique referral link and earn a percentage of each successful sale made through your link.'
                        ],
                        'hi' => [
                            'question' => 'सहयोगी कार्यक्रम कैसे काम करता है?',
                            'answer' => 'हमारा सहयोगी कार्यक्रम आपको हमारी सेवाओं के लिए नए ग्राहकों को संदर्भित करके कमीशन अर्जित करने की अनुमति देता है। आपको एक अनूठा रेफरल लिंक मिलेगा और आपके लिंक के माध्यम से की गई प्रत्येक सफल बिक्री का प्रतिशत कमाएंगे।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => true,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'How can I delete my account?',
                            'answer' => 'To delete your account, please go to your account settings and click on the "Delete Account" button. You can also contact our support team for assistance with account deletion.'
                        ],
                        'hi' => [
                            'question' => 'मैं अपना खाता कैसे हटा सकता हूं?',
                            'answer' => 'अपना खाता हटाने के लिए, कृपया अपनी खाता सेटिंग्स में जाएं और "खाता हटाएं" बटन पर क्लिक करें। आप खाता हटाने में सहायता के लिए हमारी सहायता टीम से भी संपर्क कर सकते हैं।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => true,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'How to invite people with referral link?',
                            'answer' => 'You can share your unique referral link through social media, email, or any other communication channel. When someone signs up using your link, they will be automatically associated with your account.'
                        ],
                        'hi' => [
                            'question' => 'रेफरल लिंक के साथ लोगों को कैसे आमंत्रित करें?',
                            'answer' => 'आप अपना अनूठा रेफरल लिंक सोशल मीडिया, ईमेल, या किसी अन्य संचार चैनल के माध्यम से साझा कर सकते हैं। जब कोई आपके लिंक का उपयोग करके साइन अप करता है, तो वे स्वचालित रूप से आपके खाते से जुड़ जाएंगे।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => true,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'Is the iOS app available for iPhone?',
                            'answer' => 'Yes, our iOS app is available on the App Store for iPhone and iPad users. You can download it for free and access all the features available on our web platform.'
                        ],
                        'hi' => [
                            'question' => 'क्या iPhone के लिए iOS ऐप उपलब्ध है?',
                            'answer' => 'हां, हमारा iOS ऐप iPhone और iPad उपयोगकर्ताओं के लिए ऐप स्टोर पर उपलब्ध है। आप इसे मुफ्त में डाउनलोड कर सकते हैं और हमारे वेब प्लेटफॉर्म पर उपलब्ध सभी सुविधाओं तक पहुंच सकते हैं।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => true,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'How to create a customer panel?',
                            'answer' => 'To create a customer panel, you need to register for an account on our platform. Once registered, you will have access to your personalized dashboard where you can manage your profile, view orders, and access all our services.'
                        ],
                        'hi' => [
                            'question' => 'ग्राहक पैनल कैसे बनाएं?',
                            'answer' => 'ग्राहक पैनल बनाने के लिए, आपको हमारे प्लेटफॉर्म पर एक खाते के लिए पंजीकरण करना होगा। एक बार पंजीकृत होने के बाद, आपके पास अपने व्यक्तिगत डैशबोर्ड तक पहुंच होगी जहां आप अपनी प्रोफ़ाइल प्रबंधित कर सकते हैं, ऑर्डर देख सकते हैं, और हमारी सभी सेवाओं तक पहुंच सकते हैं।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => false,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'What payment methods do you accept?',
                            'answer' => 'We accept various payment methods including credit cards, debit cards, PayPal, bank transfers, and popular digital wallets. All transactions are secured with industry-standard encryption.'
                        ],
                        'hi' => [
                            'question' => 'आप कौन से भुगतान विधियां स्वीकार करते हैं?',
                            'answer' => 'हम क्रेडिट कार्ड, डेबिट कार्ड, पेपैल, बैंक ट्रांसफर, और लोकप्रिय डिजिटल वॉलेट सहित विभिन्न भुगतान विधियां स्वीकार करते हैं। सभी लेनदेन उद्योग-मानक एन्क्रिप्शन के साथ सुरक्षित हैं।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => false,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'How can I contact customer support?',
                            'answer' => 'You can contact our customer support team through multiple channels: email us at support@example.com, call our helpline at +1-234-567-8900, or use the live chat feature on our website.'
                        ],
                        'hi' => [
                            'question' => 'मैं ग्राहक सहायता से कैसे संपर्क कर सकता हूं?',
                            'answer' => 'आप हमारी ग्राहक सहायता टीम से कई चैनलों के माध्यम से संपर्क कर सकते हैं: हमें support@example.com पर ईमेल करें, हमारी हेल्पलाइन +1-234-567-8900 पर कॉल करें, या हमारी वेबसाइट पर लाइव चैट सुविधा का उपयोग करें।'
                        ]
                    ]
                ],
                [
                    'is_homepage' => false,
                    'is_active' => true,
                    'translations' => [
                        'en' => [
                            'question' => 'What is your refund policy?',
                            'answer' => 'We offer a 30-day money-back guarantee on most of our services. If you are not satisfied with your purchase, you can request a full refund within 30 days of your purchase date.'
                        ],
                        'hi' => [
                            'question' => 'आपकी रिफंड नीति क्या है?',
                            'answer' => 'हम अपनी अधिकांश सेवाओं पर 30-दिन की मनी-बैक गारंटी प्रदान करते हैं। यदि आप अपनी खरीदारी से संतुष्ट नहीं हैं, तो आप अपनी खरीदारी की तारीख से 30 दिनों के भीतर पूर्ण रिफंड का अनुरोध कर सकते हैं।'
                        ]
                    ]
                ]
            ];

            foreach ($faqs as $faqData) {
                $faq = Faq::create([
                    'name' => 'FAQ-' . uniqid(),
                    'is_homepage' => $faqData['is_homepage'],
                    'is_active' => $faqData['is_active'],
                ]);

                foreach ($faqData['translations'] as $locale => $translation) {
                    FaqTranslation::create([
                        'faq_id' => $faq->id,
                        'locale' => $locale,
                        'question' => $translation['question'],
                        'answer' => $translation['answer'],
                    ]);
                }
            }
        });
    }
}