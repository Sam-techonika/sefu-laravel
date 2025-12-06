<?php

return [
    'main' => [
        ['name' => 'होम', 'route' => 'home'],
        ['name' => 'अबाउट अस', 'route' => 'about'],
        ['name' => 'हमारी सर्विसेज़', 'route' => 'service'],
          ['name' => 'पैकेज', 'submenu' => [
            ['name' => 'इंडियन रेज़िडेंट्स के लिए कंपनी रजिस्ट्रेशन', 'route' => 'registration.local'],
            ['name' => 'NRIs/Foreigners के लिए कंपनी रजिस्ट्रेशन', 'route' => 'registration.foreign'],
            ['name' => 'ट्रेडमार्क रजिस्ट्रेशन', 'route' => 'registration.trade-registration'],
        ]],
                ['name' => 'ब्लॉग', 'route' => 'blogs'],

        ['name' => 'एक्सप्लोर', 'submenu' => [
            ['name' => 'केस स्टडीज़', 'route' => 'case.study'],
            ['name' => 'प्रशंसापत्र', 'route' => 'testimonials'],
            ['name' => 'अक्सर पूछे जाने वाले प्रश्न', 'route' => 'faq'],
        ]],
    ],
    'languages' => [
        'en' => 'अंग्रेज़ी',
        'hi' => 'हिंदी',
    ],
];
