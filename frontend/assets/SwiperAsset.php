<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class SwiperAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'swiper/swiper.min.css',
    ];
    public $js = [
        'swiper/swiper.min.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
