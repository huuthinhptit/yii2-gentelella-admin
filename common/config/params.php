<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,

    'public_url' => 'http://cdn.datingapp.gdcvn.com',
    'upload_full_path' => '/app/upload/dating-app/',
    'upload_base_dir' => [
        'profile' => [
            'avatar_dir' => '/profile/avatar/',
            'cover_dir' => '/profile/cover/',
            'photo_dir' => '/profile/photo/',
        ],
    ],
    'max_photos_one_upload' => 5,
    'queue' => [
        'host' => 'localhost',
        'port' => 5672,
        'user' => 'guest',
        'pass' => 'guest',
    ],

    'mid' => [
        'change-icash' => 'https://mid.gdcvn.com/v2/users/change-icash'
    ],

    'setting_conversation' => [
        'encKey' => '4cd43515621cc49592'
    ],

    'online_time' => 15 * 60,
];
