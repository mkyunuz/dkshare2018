<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ThemingAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome-4.7.0/css/font-awesome.min.css',
        'css/AdminLTE.css',
        'css/skins/_all-skins.css',
        'components/morris.js/morris.css',
        'components/jvectormap/jquery-jvectormap.css',
        'components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'components/bootstrap-daterangepicker/daterangepicker.css',
        'components/pace/themes/blue/pace-theme-minimal.css',
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic',
    ];
    public $js = [
        'js/main.js',
        'components/raphael/raphael.min.js',
        'components/morris.js/morris.min.js',
        'components/jquery-sparkline/dist/jquery.sparkline.min.js',
        'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',

        'plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'components/jquery-knob/dist/jquery.knob.min.js',
        'components/moment/min/moment.min.js',
        'components/bootstrap-daterangepicker/daterangepicker.js',
        'components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'components/jquery-slimscroll/jquery.slimscroll.min.js',
        'components/fastclick/lib/fastclick.js',
        'components/pace/pace.js',
        'js/adminlte.min.js',
        // 'js/pages/dashboard.js',
        // 'js/demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
