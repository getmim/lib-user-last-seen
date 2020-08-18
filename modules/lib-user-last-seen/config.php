<?php

return [
    '__name' => 'lib-user-last-seen',
    '__version' => '0.1.0',
    '__git' => 'git@github.com:getmim/lib-user-last-seen.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/lib-user-last-seen' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'lib-event' => NULL
            ],
            [
                'lib-user' => NULL
            ],
            [
                'lib-model' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'LibUserLastSeen\\Model' => [
                'type' => 'file',
                'base' => 'modules/lib-user-last-seen/model'
            ],
            'LibUserLastSeen\\Library' => [
                'type' => 'file',
                'base' => 'modules/lib-user-last-seen/library'
            ]
        ],
        'files' => []
    ],
    'libFormatter' => [
        'formats' => [
            'user' => [
                'seen' => [
                    'type' => 'partial',
                    'model' => [
                        'name' => 'LibUserLastSeen\\Model\\UserLastSeen',
                        'field' => 'user'
                    ],
                    'format' => 'user-last-seen'
                ]
            ],
            'user-last-seen' => [
                'id' => [
                    'type' => 'number'
                ],
                'user' => [
                    'type' => 'user'
                ],
                'seen' => [
                    'type' => 'date'
                ],
                'updated' => [
                    'type' => 'date'
                ],
                'created' => [
                    'type' => 'date'
                ]
            ]
        ]
    ],
    'libEvent' => [
        'events' => [
            'user:identified' => [
                'LibUserLastSeen\\Library\\Handler::identified' => true
            ],
            'user:authorized' => [
                'LibUserLastSeen\\Library\\Handler::authorized' => true
            ]
        ]
    ]
];