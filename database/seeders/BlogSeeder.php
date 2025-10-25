<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Tag;
use App\Models\TagTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $admin = User::where('role', 'admin')->first();
            
            if (!$admin) {
                throw new \Exception('Admin user not found. Please run AdminUserSeeder first.');
            }
            
            // Helper function to find category by English name
            $findCategoryByName = function($name) {
                $categoryTranslation = CategoryTranslation::where('name', $name)
                    ->where('locale', 'en')
                    ->first();
                return $categoryTranslation ? $categoryTranslation->category : null;
            };

            // Helper function to find tag by English name
            $findTagByName = function($name) {
                $tagTranslation = TagTranslation::where('name', $name)
                    ->where('locale', 'en')
                    ->first();
                return $tagTranslation ? $tagTranslation->tag : null;
            };

            $blogData = [
                [
                    'name' => 'Laravel 11 Complete Guide',
                    'featured_image' => 'laravel-guide.jpg',
                    'category_name' => 'Web Development',
                    'tag_names' => ['Laravel', 'PHP', 'Tutorial', 'Beginner'],
                    'translations' => [
                        'en' => [
                            'title' => 'Getting Started with Laravel 11: A Complete Guide',
                            'slug' => 'getting-started-laravel-11-complete-guide',
                            'at_glance' => 'Learn the fundamentals of Laravel 11, the latest version of the popular PHP framework. This comprehensive guide covers installation, basic concepts, and building your first application.',
                            'introduction' => 'Laravel 11 brings exciting new features and improvements to the already powerful PHP framework. Whether you\'re a beginner or an experienced developer, this guide will help you understand the core concepts and get started with building amazing web applications.',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'Installation Requirements'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'To get started with Laravel 11, you need to have PHP 8.2 or higher installed on your system. Make sure you also have Composer, the PHP dependency manager.'
                                ],
                                [
                                    'type' => 'code',
                                    'content' => 'composer create-project laravel/laravel my-app'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'Key Features of Laravel 11'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'Improved performance and optimization',
                                        'Enhanced security features',
                                        'Better developer experience',
                                        'Modern PHP 8.2+ features support'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'Laravel 11 requires PHP 8.2+, offers improved performance, includes enhanced security features, and provides better developer experience with modern PHP features.',
                            'faqs' => json_encode([
                                [
                                    'question' => 'What is Laravel?',
                                    'answer' => 'Laravel is a PHP web application framework with expressive, elegant syntax that makes web development enjoyable and creative.'
                                ],
                                [
                                    'question' => 'Is Laravel 11 stable?',
                                    'answer' => 'Yes, Laravel 11 is the latest stable version with long-term support and regular updates.'
                                ]
                            ])
                        ],
                        'hi' => [
                            'title' => 'Laravel 11 के साथ शुरुआत: एक संपूर्ण गाइड',
                            'slug' => 'laravel-11-complete-guide-hindi',
                            'at_glance' => 'लोकप्रिय PHP फ्रेमवर्क के नवीनतम संस्करण Laravel 11 के मूल सिद्धांत सीखें। यह व्यापक गाइड इंस्टालेशन, बुनियादी अवधारणाओं और आपके पहले एप्लिकेशन के निर्माण को कवर करता है।',
                            'introduction' => 'Laravel 11 पहले से ही शक्तिशाली PHP फ्रेमवर्क में रोमांचक नई सुविधाएं और सुधार लाता है। चाहे आप एक शुरुआती हों या अनुभवी डेवलपर, यह गाइड आपको मुख्य अवधारणाओं को समझने और अद्भुत वेब एप्लिकेशन बनाने में मदद करेगा।',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'इंस्टालेशन आवश्यकताएं'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'Laravel 11 के साथ शुरुआत करने के लिए, आपको अपने सिस्टम पर PHP 8.2 या उससे ऊपर का इंस्टॉल होना चाहिए। सुनिश्चित करें कि आपके पास Composer, PHP dependency manager भी है।'
                                ],
                                [
                                    'type' => 'code',
                                    'content' => 'composer create-project laravel/laravel my-app'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'Laravel 11 की मुख्य विशेषताएं'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'बेहतर प्रदर्शन और अनुकूलन',
                                        'बेहतर सुरक्षा सुविधाएं',
                                        'बेहतर डेवलपर अनुभव',
                                        'आधुनिक PHP 8.2+ सुविधाओं का समर्थन'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'Laravel 11 के लिए PHP 8.2+ की आवश्यकता है, बेहतर प्रदर्शन प्रदान करता है, बेहतर सुरक्षा सुविधाएं शामिल करता है, और आधुनिक PHP सुविधाओं के साथ बेहतर डेवलपर अनुभव प्रदान करता है।',
                            'faqs' => json_encode([
                                [
                                    'question' => 'Laravel क्या है?',
                                    'answer' => 'Laravel एक PHP वेब एप्लिकेशन फ्रेमवर्क है जो अभिव्यंजक, सुरुचिपूर्ण सिंटैक्स के साथ वेब डेवलपमेंट को आनंददायक और रचनात्मक बनाता है।'
                                ],
                                [
                                    'question' => 'क्या Laravel 11 स्थिर है?',
                                    'answer' => 'हां, Laravel 11 दीर्घकालिक समर्थन और नियमित अपडेट के साथ नवीनतम स्थिर संस्करण है।'
                                ]
                            ])
                        ]
                    ]
                ],
                [
                    'name' => 'Machine Learning with Python',
                    'featured_image' => 'ml-python.jpg',
                    'category_name' => 'Artificial Intelligence',
                    'tag_names' => ['Python', 'Machine Learning', 'Tutorial', 'Beginner'],
                    'translations' => [
                        'en' => [
                            'title' => 'Introduction to Machine Learning with Python',
                            'slug' => 'introduction-machine-learning-python',
                            'at_glance' => 'Explore the world of machine learning using Python and popular libraries like scikit-learn, pandas, and numpy. Perfect for beginners starting their ML journey.',
                            'introduction' => 'Machine learning has become one of the most important technologies in the modern world. Python, with its rich ecosystem of libraries, makes it accessible for developers to dive into the fascinating world of artificial intelligence.',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'Getting Started with Python for ML'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'Python is the most popular language for machine learning due to its simplicity and powerful libraries. Let\'s explore the essential tools you\'ll need.'
                                ],
                                [
                                    'type' => 'code',
                                    'content' => 'pip install scikit-learn pandas numpy matplotlib'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'Essential Libraries'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'NumPy for numerical computing',
                                        'Pandas for data manipulation',
                                        'Scikit-learn for machine learning algorithms',
                                        'Matplotlib for visualization'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'Python is ideal for ML due to its simplicity and rich ecosystem. Essential libraries include NumPy, Pandas, and Scikit-learn. Start with simple algorithms before moving to complex models.',
                            'faqs' => json_encode([
                                [
                                    'question' => 'What is Machine Learning?',
                                    'answer' => 'Machine learning is a subset of AI that enables computers to learn and improve from experience without being explicitly programmed.'
                                ],
                                [
                                    'question' => 'Why Python for ML?',
                                    'answer' => 'Python offers simplicity, readability, and a vast ecosystem of ML libraries, making it the preferred choice for data scientists.'
                                ]
                            ])
                        ],
                        'hi' => [
                            'title' => 'Python के साथ मशीन लर्निंग का परिचय',
                            'slug' => 'python-machine-learning-introduction-hindi',
                            'at_glance' => 'Python और लोकप्रिय लाइब्रेरीज जैसे scikit-learn, pandas, और numpy का उपयोग करके मशीन लर्निंग की दुनिया का अन्वेषण करें। ML यात्रा शुरू करने वाले शुरुआती लोगों के लिए उत्तम।',
                            'introduction' => 'मशीन लर्निंग आधुनिक दुनिया की सबसे महत्वपूर्ण तकनीकों में से एक बन गई है। Python, अपनी समृद्ध लाइब्रेरी पारिस्थितिकी तंत्र के साथ, डेवलपर्स के लिए कृत्रिम बुद्धिमत्ता की आकर्षक दुनिया में गोता लगाना सुलभ बनाता है।',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'ML के लिए Python के साथ शुरुआत'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'Python अपनी सरलता और शक्तिशाली लाइब्रेरीज के कारण मशीन लर्निंग के लिए सबसे लोकप्रिय भाषा है। आइए उन आवश्यक उपकरणों का अन्वेषण करें जिनकी आपको आवश्यकता होगी।'
                                ],
                                [
                                    'type' => 'code',
                                    'content' => 'pip install scikit-learn pandas numpy matplotlib'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'आवश्यक लाइब्रेरीज'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'संख्यात्मक कंप्यूटिंग के लिए NumPy',
                                        'डेटा हेरफेर के लिए Pandas',
                                        'मशीन लर्निंग एल्गोरिदम के लिए Scikit-learn',
                                        'विज़ुअलाइज़ेशन के लिए Matplotlib'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'Python अपनी सरलता और समृद्ध पारिस्थितिकी तंत्र के कारण ML के लिए आदर्श है। आवश्यक लाइब्रेरीज में NumPy, Pandas, और Scikit-learn शामिल हैं। जटिल मॉडल पर जाने से पहले सरल एल्गोरिदम से शुरुआत करें।',
                            'faqs' => json_encode([
                                [
                                    'question' => 'मशीन लर्निंग क्या है?',
                                    'answer' => 'मशीन लर्निंग AI का एक भाग है जो कंप्यूटर को स्पष्ट रूप से प्रोग्राम किए बिना अनुभव से सीखने और सुधारने में सक्षम बनाता है।'
                                ],
                                [
                                    'question' => 'ML के लिए Python क्यों?',
                                    'answer' => 'Python सरलता, पठनीयता, और ML लाइब्रेरीज का विशाल पारिस्थितिकी तंत्र प्रदान करता है, जो इसे डेटा वैज्ञानिकों की पसंदीदा पसंद बनाता है।'
                                ]
                            ])
                        ]
                    ]
                ],
                [
                    'name' => 'AWS Cloud Services Guide',
                    'featured_image' => 'aws-guide.jpg',
                    'category_name' => 'Cloud Computing',
                    'tag_names' => ['AWS', 'Tutorial', 'Beginner'],
                    'translations' => [
                        'en' => [
                            'title' => 'AWS Cloud Services: Complete Beginner Guide',
                            'slug' => 'aws-cloud-services-beginner-guide',
                            'at_glance' => 'Learn about Amazon Web Services and how to deploy applications in the cloud. This guide covers core services like EC2, S3, and RDS for beginners.',
                            'introduction' => 'Amazon Web Services (AWS) is the world\'s most comprehensive cloud platform, offering over 200 services from data centers globally. This guide will help you understand the basics and get started with cloud computing.',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'AWS Core Services'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'AWS offers hundreds of services, but let\'s focus on the core ones that every developer should know about.'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'Essential Services'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'EC2 - Elastic Compute Cloud for virtual servers',
                                        'S3 - Simple Storage Service for object storage',
                                        'RDS - Relational Database Service',
                                        'Lambda - Serverless computing platform'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'AWS is the leading cloud provider offering 200+ services. Core services include EC2 for compute, S3 for storage, and RDS for databases. Pay-as-you-use pricing model makes it cost-effective.',
                            'faqs' => json_encode([
                                [
                                    'question' => 'What is cloud computing?',
                                    'answer' => 'Cloud computing is the delivery of computing services over the internet, including storage, databases, networking, and software.'
                                ],
                                [
                                    'question' => 'Why choose AWS?',
                                    'answer' => 'AWS offers reliability, scalability, security, and a comprehensive set of services with global infrastructure.'
                                ]
                            ])
                        ],
                        'hi' => [
                            'title' => 'AWS क्लाउड सेवाएं: पूर्ण शुरुआती गाइड',
                            'slug' => 'aws-cloud-services-beginner-guide-hindi',
                            'at_glance' => 'Amazon Web Services के बारे में जानें और क्लाउड में एप्लिकेशन को कैसे deploy करें। यह गाइड शुरुआती लोगों के लिए EC2, S3, और RDS जैसी मुख्य सेवाओं को कवर करता है।',
                            'introduction' => 'Amazon Web Services (AWS) दुनिया का सबसे व्यापक क्लाउड प्लेटफॉर्म है, जो वैश्विक डेटा केंद्रों से 200 से अधिक सेवाएं प्रदान करता है। यह गाइड आपको मूल बातें समझने और क्लाउड कंप्यूटिंग के साथ शुरुआत करने में मदद करेगा।',
                            'main_content' => json_encode([
                                [
                                    'type' => 'heading',
                                    'content' => 'AWS मुख्य सेवाएं'
                                ],
                                [
                                    'type' => 'paragraph',
                                    'content' => 'AWS सैकड़ों सेवाएं प्रदान करता है, लेकिन आइए उन मुख्य सेवाओं पर ध्यान दें जिनके बारे में हर डेवलपर को जानना चाहिए।'
                                ],
                                [
                                    'type' => 'heading',
                                    'content' => 'आवश्यक सेवाएं'
                                ],
                                [
                                    'type' => 'list',
                                    'content' => [
                                        'EC2 - वर्चुअल सर्वर के लिए Elastic Compute Cloud',
                                        'S3 - ऑब्जेक्ट स्टोरेज के लिए Simple Storage Service',
                                        'RDS - Relational Database Service',
                                        'Lambda - सर्वरलेस कंप्यूटिंग प्लेटफॉर्म'
                                    ]
                                ]
                            ]),
                            'key_takeaways' => 'AWS 200+ सेवाएं प्रदान करने वाला अग्रणी क्लाउड प्रदाता है। मुख्य सेवाओं में कंप्यूट के लिए EC2, स्टोरेज के लिए S3, और डेटाबेस के लिए RDS शामिल हैं। उपयोग के अनुसार भुगतान मॉडल इसे लागत-प्रभावी बनाता है।',
                            'faqs' => json_encode([
                                [
                                    'question' => 'क्लाउड कंप्यूटिंग क्या है?',
                                    'answer' => 'क्लाउड कंप्यूटिंग इंटरनेट पर कंप्यूटिंग सेवाओं की डिलीवरी है, जिसमें स्टोरेज, डेटाबेस, नेटवर्किंग, और सॉफ्टवेयर शामिल हैं।'
                                ],
                                [
                                    'question' => 'AWS क्यों चुनें?',
                                    'answer' => 'AWS वैश्विक infrastructure के साथ विश्वसनीयता, स्केलेबिलिटी, सुरक्षा, और सेवाओं का व्यापक सेट प्रदान करता है।'
                                ]
                            ])
                        ]
                    ]
                ]
            ];

            foreach ($blogData as $data) {
                // Create the main blog record
                $blog = Blog::create([
                    'name' => $data['name'],
                    'featured_image' => $data['featured_image'],
                    'author' => $admin->id,
                    'is_active' => true
                ]);

                // Find category
                $category = $findCategoryByName($data['category_name']);

                // Create translations for each locale
                foreach ($data['translations'] as $locale => $translation) {
                    BlogTranslation::create([
                        'blog_id' => $blog->id,
                        'locale' => $locale,
                        'slug' => $translation['slug'],
                        'category_id' => $category ? $category->id : null,
                        'title' => $translation['title'],
                        'at_glance' => $translation['at_glance'],
                        'introduction' => $translation['introduction'],
                        'main_content' => $translation['main_content'],
                        'key_takeaways' => $translation['key_takeaways'],
                        'faqs' => $translation['faqs']
                    ]);
                }

                // Attach tags to the blog
                $tagIds = [];
                foreach ($data['tag_names'] as $tagName) {
                    $tag = $findTagByName($tagName);
                    if ($tag) {
                        $tagIds[] = $tag->id;
                    }
                }
                if (!empty($tagIds)) {
                    $blog->tags()->attach($tagIds);
                }
            }
        });
    }
}