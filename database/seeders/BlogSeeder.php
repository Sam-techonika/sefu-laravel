<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $admin = User::where('role', 'admin')->first();
            $categories = Category::with('translations')->get();
            $tags = Tag::with('translations')->get();

            // Helper function to find category by name
            $findCategoryByName = function($name) use ($categories) {
                return $categories->first(function($category) use ($name) {
                    return $category->translations->contains('name', $name);
                });
            };

            // Helper function to find tag by name
            $findTagByName = function($name) use ($tags) {
                return $tags->first(function($tag) use ($name) {
                    return $tag->translations->contains('name', $name);
                });
            };

            $blogs = [
                [
                    'locale' => 'en',
                    'category_name' => 'Web Development',
                    'title' => [
                        'en' => 'Getting Started with Laravel 11: A Complete Guide',
                        'hi' => 'Laravel 11 के साथ शुरुआत: एक संपूर्ण गाइड'
                    ],
                    'featured_image' => 'laravel-guide.jpg',
                    'at_glance' => [
                        'en' => 'Learn the fundamentals of Laravel 11, the latest version of the popular PHP framework.',
                        'hi' => 'लोकप्रिय PHP फ्रेमवर्क के नवीनतम संस्करण Laravel 11 के मूल सिद्धांत सीखें।'
                    ],
                    'introduction' => [
                        'en' => 'Laravel 11 brings exciting new features and improvements to the already powerful PHP framework...',
                        'hi' => 'Laravel 11 पहले से ही शक्तिशाली PHP फ्रेमवर्क में रोमांचक नई सुविधाएं और सुधार लाता है...'
                    ],
                    'main_content' => [
                        'en' => '<h2>Installation</h2><p>To get started with Laravel 11, you need to have PHP 8.2 or higher...</p>',
                        'hi' => '<h2>इंस्टालेशन</h2><p>Laravel 11 के साथ शुरुआत करने के लिए, आपको PHP 8.2 या उससे ऊपर का होना चाहिए...</p>'
                    ],
                    'key_takeaways' => [
                        'en' => [
                            'Laravel 11 requires PHP 8.2+',
                            'New features include improved performance',
                            'Enhanced security features'
                        ],
                        'hi' => [
                            'Laravel 11 के लिए PHP 8.2+ की आवश्यकता है',
                            'नई सुविधाओं में बेहतर प्रदर्शन शामिल है',
                            'बेहतर सुरक्षा सुविधाएं'
                        ]
                    ],
                    'faqs' => [
                        'en' => [
                            [
                                'question' => 'What is Laravel?',
                                'answer' => 'Laravel is a PHP web application framework...'
                            ]
                        ],
                        'hi' => [
                            [
                                'question' => 'Laravel क्या है?',
                                'answer' => 'Laravel एक PHP वेब एप्लिकेशन फ्रेमवर्क है...'
                            ]
                        ]
                    ],
                    'author' => [
                        'en' => [
                            'name' => $admin->name,
                            'bio' => 'Senior PHP Developer with 5+ years of experience'
                        ],
                        'hi' => [
                            'name' => $admin->name,
                            'bio' => '5+ साल के अनुभव के साथ सीनियर PHP डेवलपर'
                        ]
                    ],
                    'tag_names' => ['Laravel', 'PHP', 'Tutorial', 'Beginner']
                ],
                [
                    'locale' => 'en',
                    'category_name' => 'Artificial Intelligence',
                    'title' => [
                        'en' => 'Introduction to Machine Learning with Python',
                        'hi' => 'Python के साथ मशीन लर्निंग का परिचय'
                    ],
                    'featured_image' => 'ml-python.jpg',
                    'at_glance' => [
                        'en' => 'Explore the world of machine learning using Python and popular libraries.',
                        'hi' => 'Python और लोकप्रिय लाइब्रेरीज का उपयोग करके मशीन लर्निंग की दुनिया का अन्वेषण करें।'
                    ],
                    'introduction' => [
                        'en' => 'Machine learning has become one of the most important technologies...',
                        'hi' => 'मशीन लर्निंग सबसे महत्वपूर्ण तकनीकों में से एक बन गई है...'
                    ],
                    'main_content' => [
                        'en' => '<h2>Getting Started</h2><p>Python is the most popular language for machine learning...</p>',
                        'hi' => '<h2>शुरुआत</h2><p>Python मशीन लर्निंग के लिए सबसे लोकप्रिय भाषा है...</p>'
                    ],
                    'key_takeaways' => [
                        'en' => [
                            'Python is ideal for ML',
                            'Libraries like scikit-learn are essential',
                            'Start with simple algorithms'
                        ],
                        'hi' => [
                            'Python ML के लिए आदर्श है',
                            'scikit-learn जैसी लाइब्रेरीज आवश्यक हैं',
                            'सरल एल्गोरिदम से शुरुआत करें'
                        ]
                    ],
                    'faqs' => [
                        'en' => [
                            [
                                'question' => 'What is Machine Learning?',
                                'answer' => 'Machine learning is a subset of AI...'
                            ]
                        ],
                        'hi' => [
                            [
                                'question' => 'मशीन लर्निंग क्या है?',
                                'answer' => 'मशीन लर्निंग AI का एक भाग है...'
                            ]
                        ]
                    ],
                    'author' => [
                        'en' => [
                            'name' => $admin->name,
                            'bio' => 'AI/ML Engineer and Technical Writer'
                        ],
                        'hi' => [
                            'name' => $admin->name,
                            'bio' => 'AI/ML इंजीनियर और तकनीकी लेखक'
                        ]
                    ],
                    'tag_names' => ['Python', 'Machine Learning', 'Tutorial', 'Beginner']
                ],
                [
                    'locale' => 'en',
                    'category_name' => 'Cloud Computing',
                    'title' => [
                        'en' => 'AWS Cloud Services: Complete Beginner Guide',
                        'hi' => 'AWS क्लाउड सेवाएं: पूर्ण शुरुआती गाइड'
                    ],
                    'featured_image' => 'aws-guide.jpg',
                    'at_glance' => [
                        'en' => 'Learn about Amazon Web Services and how to deploy applications in the cloud.',
                        'hi' => 'Amazon Web Services के बारे में जानें और क्लाउड में एप्लिकेशन को कैसे deploy करें।'
                    ],
                    'introduction' => [
                        'en' => 'Amazon Web Services (AWS) is the world\'s most comprehensive cloud platform...',
                        'hi' => 'Amazon Web Services (AWS) दुनिया का सबसे व्यापक क्लाउड प्लेटफॉर्म है...'
                    ],
                    'main_content' => [
                        'en' => '<h2>AWS Core Services</h2><p>AWS offers hundreds of services, but let\'s focus on the core ones...</p>',
                        'hi' => '<h2>AWS मुख्य सेवाएं</h2><p>AWS सैकड़ों सेवाएं प्रदान करता है, लेकिन आइए मुख्य सेवाओं पर ध्यान दें...</p>'
                    ],
                    'key_takeaways' => [
                        'en' => [
                            'AWS is the leading cloud provider',
                            'EC2 for compute, S3 for storage',
                            'Pay-as-you-use pricing model'
                        ],
                        'hi' => [
                            'AWS अग्रणी क्लाउड प्रदाता है',
                            'कंप्यूट के लिए EC2, स्टोरेज के लिए S3',
                            'उपयोग के अनुसार भुगतान मॉडल'
                        ]
                    ],
                    'faqs' => [
                        'en' => [
                            [
                                'question' => 'What is cloud computing?',
                                'answer' => 'Cloud computing is the delivery of computing services...'
                            ]
                        ],
                        'hi' => [
                            [
                                'question' => 'क्लाउड कंप्यूटिंग क्या है?',
                                'answer' => 'क्लाउड कंप्यूटिंग कंप्यूटिंग सेवाओं की डिलीवरी है...'
                            ]
                        ]
                    ],
                    'author' => [
                        'en' => [
                            'name' => $admin->name,
                            'bio' => 'Cloud Solutions Architect'
                        ],
                        'hi' => [
                            'name' => $admin->name,
                            'bio' => 'क्लाउड सॉल्यूशन आर्किटेक्ट'
                        ]
                    ],
                    'tag_names' => ['AWS', 'Tutorial', 'Beginner']
                ]
            ];

            foreach ($blogs as $blogData) {
                $category = $findCategoryByName($blogData['category_name']);
                
                $blog = Blog::create([
                    'locale' => $blogData['locale'],
                    'category_id' => $category ? $category->id : null,
                    'title' => $blogData['title'],
                    'featured_image' => $blogData['featured_image'],
                    'at_glance' => $blogData['at_glance'],
                    'introduction' => $blogData['introduction'],
                    'main_content' => $blogData['main_content'],
                    'key_takeaways' => $blogData['key_takeaways'],
                    'faqs' => $blogData['faqs'],
                    'author' => $blogData['author']
                ]);

                // Attach tags to the blog
                $tagIds = [];
                foreach ($blogData['tag_names'] as $tagName) {
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