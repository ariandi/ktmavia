<?php
use kartik\mpdf\Pdf;

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
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
            // 'i18n' => []
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
		'masterdata' => [
            'class' => 'backend\modules\masterdata\Masterdata',
        ],
        'seaexport' => [
            'class' => 'backend\modules\seaexport\Seaexport',
        ],
        'seaimport' => [
            'class' => 'backend\modules\seaimport\Seaimport',
        ],
        'airexport' => [
            'class' => 'backend\modules\airexport\Airexport',
        ],
		
       'airimport' => [
            'class' => 'backend\modules\airimport\Airimport',
        ],

        'report' => [
            'class' => 'backend\modules\report\Report',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		'authManager'=>
			[
				'class' => 'yii\rbac\DbManager',
				'defaultRoles' => ['guest'],
			],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
