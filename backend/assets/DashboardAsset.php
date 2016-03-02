<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/bootstrap.min.css',
		'font-awesome-4.4.0/css/font-awesome.min.css',
		'ionicons-2.0.1/css/ionicons.min.css',
		'css/AdminLTE.min.css',
		'css/skins/_all-skins.min.css',
		//'plugins/iCheck/flat/blue.css',
        'css/site.css',
    ];
    public $js = [
		//'js/jQuery-2.1.4.min.js',
		'js/bootstrap/bootstrap.min.js',
		'jquery-ui-1.11.4/jquery-ui.min.js',
		'js/raphael-min.js',
		'plugins/sparkline/jquery.sparkline.min.js',
		'plugins/slimScroll/jquery.slimscroll.min.js',
		'plugins/fastclick/fastclick.min.js',
		'js/app.min.js',
		//'js/pages/dashboard.js',
		'js/demo.js',
		'js/qdmain.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
