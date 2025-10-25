<?php

return [
    'main' => [
        ['name' => 'होम', 'route' => 'home'],
        ['name' => 'हमारे बारे में', 'route' => 'about'],
        ['name' => 'हमारी सेवाएँ', 'route' => 'service'],
          ['name' => 'पैकेज', 'submenu' => [
            ['name' => 'स्थानीय कंपनी पंजीकरण', 'route' => 'registration.local'],
            ['name' => 'विदेशी नागरिक योजना तुलना', 'route' => 'registration.foreign'],
            ['name' => 'ट्रेडमार्क पंजीकरण', 'route' => 'registration.trade-registration'],
        ]],
                ['name' => 'ब्लॉग', 'route' => 'blogs'],

        ['name' => 'एक्सप्लोर', 'submenu' => [
            ['name' => 'केस स्टडी', 'route' => 'case.study'],
            ['name' => 'प्रशंसापत्र', 'route' => 'testimonials'],
            ['name' => 'सामान्य प्रश्न', 'route' => 'faq'],
        ]],
    ],
    'languages' => [
        'en' => 'अंग्रेज़ी',
        'hi' => 'हिंदी',
    ],
];
