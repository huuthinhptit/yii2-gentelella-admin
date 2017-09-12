<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
        'log',
        [
            'class' => 'backend\components\LanguageSelector',
            'supportedLanguages' => ['vi', 'en'],
        ],
    ],
    //'language' => 'vi',
    //'language' => 'zh-CN',
    'modules'=>[
        'admin' => [
            'class' => 'mdm\admin\Module',
            //'layout' => 'left-menu',
            'layout' => '@app/views/layouts/main',
        ],

        'user' => [
            'class' => 'dektrium\user\Module',
            'admins' => ['admin'],
            'enableConfirmation' => false,
            'enableRegistration' => false,
            'enablePasswordRecovery' => false,
            'enableFlashMessages' => false,
            'modelMap' => [
                'LoginForm' => 'backend\models\LoginForm',
            ],
            'controllerMap' => [
                'security' => 'backend\controllers\user\SecurityController',
            ],
        ],

        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to
            // use your own export download action or custom translation
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],

    ],

    'aliases' => [
        '@mdm/admin' => '@app/extensions/mdm/yii2-admin',
    ],

    'components' => [
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => false,
        ],
         //override view Yii2-User login layout
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'db' => [
            'tablePrefix' => 'cms_',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    //'sourceLanguage' => 'vi',
                    //'fileMap' => [
                    //'app' => 'app.php',
                    //],
                ],
            ],
        ],

        // Backend uses the YiiBooster package for its UI
        'bootstrap' => [
            // `bootstrap` path alias was defined in global init script
            'class' => 'bootstrap.components.Bootstrap',
            'responsiveCss' => true,
            'fontAwesomeCss' => true,
            'yiiCss' => false,
            'enableJS' => true,
        ],

        // yii2-admin
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['default'],
        ],

//        'user' => [
//            'identityClass' => 'backend\models\User',
//            'enableAutoLogin' => true,
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
            ],
        ],
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/logout',
            'user/security/login',
            'user/security/logout',
            'gii/*',
        ],
    ],

    'params' => $params,
];