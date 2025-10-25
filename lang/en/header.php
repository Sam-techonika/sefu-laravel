<?php

return [
    'main' => [
        ['name' => 'Home', 'route' => 'home'],
        ['name' => 'About Us', 'route' => 'about'],
        ['name' => 'Our Services', 'route' => 'service'],
        ['name' => 'Package', 'submenu' => [
            ['name' => 'Company Registration For Locals', 'route' => 'registration.local'],
            ['name' => 'Compare Plan Foreign National', 'route' => 'registration.foreign'],
            ['name' => 'Trademark Registration', 'route' => 'registration.trade-registration'],
        ]],
        ['name' => 'Blogs', 'route' => 'blogs'],
        ['name' => 'Explore', 'submenu' => [
            ['name' => 'Case Study', 'route' => 'case.study'],
            ['name' => 'Testimonials', 'route' => 'testimonials'],
            ['name' => 'FAQ', 'route' => 'faq'],
        ]],
   
    ],
    'languages' => [
        'en' => 'English',
        'hi' => 'Hindi',
    ],
];
