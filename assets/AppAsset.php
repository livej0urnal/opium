<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'vendors/linericon/style.css',
        'css/font-awesome.min.css',
        'vendors/owl-carousel/owl.carousel.min.css',
        'vendors/lightbox/simpleLightbox.css',
        'vendors/nice-select/css/nice-select.css',
        'vendors/animate-css/animate.css',
        'vendors/jquery-ui/jquery-ui.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery-3.2.1.min.js',
        'js/popper.js',
        'js/bootstrap.min.js',
        'js/stellar.js',
        'vendors/lightbox/simpleLightbox.min.js',
        'vendors/nice-select/js/jquery.nice-select.min.js',
        'vendors/isotope/imagesloaded.pkgd.min.js',
        'vendors/isotope/isotope-min.js',
        'vendors/owl-carousel/owl.carousel.min.js',
        'vendors/jquery-ui/jquery-ui.js',
        'js/jquery.ajaxchimp.min.js',
        'js/mail-script.js',
        'js/theme.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
