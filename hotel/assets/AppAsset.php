<?php

namespace hotel\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/custom.css',
        'font-awesome/css/font-awesome.css',
        'js/gritter/css/jquery.gritter.css',
        'lineicons/style.css',
        'css/style-responsive.css',
        'css/table-responsive.css',
        'css/to-do.css',
        'css/zabuto_calendar.css',
        'js/fullcalendar/bootstrap-fullcalendar.css'

    ];
    public $js = [
      'js/jquery.dcjqaccordion.2.7.js',
      'js/jquery.scrollTo.min.js',
      'js/jquery.nicescroll.js',
      'js/jquery.sparkline.js',
      'js/gritter/js/jquery.gritter.js',
      'js/gritter-conf.js',
      'js/sparkline-chart.js',
      'js/common-scripts.js',
      'js/zabuto_calendar.js',
      'js/chart-master/Chart.js',
      'js/fullcalendar/fullcalendar.min.js',
      'js/calendar-conf-events.js',
      'js/jquery.backstretch.min.js'




    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
