<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $videos frontend\controllers\VideoController */

$this->title = 'Magnet | Видео';
?>
<style>
    .inner_container{ margin-left: 220px; padding-right: 220px; width: 100%; margin-top: -170px;}
    .pagination {
        clear: both;
        display: block;
        padding-top: 20px;
    }

    @media (max-width: 1325px) {
        .video_list {
            height: 216px !important;
            padding: 10px 5px;
            width: 450px !important;
        }
        .video-index img {
            height: auto !important;
            left: 0 !important;
            margin-top: 0;
            max-width: 100% !important;
            position: relative !important;
        }
    }

    @media (max-width: 768px) {
        .inner_container{padding:0; margin:0;}
        .video_list {
            height: auto !important;
            width: auto !important;
            padding: 5px 10px;
        }
        .video-index img {
            height: auto !important;
            left: 0 !important;
            margin-top: 0;
            max-width: 100% !important;
            position: relative !important;
        }
    }
</style>
<?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_list',
        'summary'=>'',
        'options' => [
            'class' => 'video-index mtop',
        ],'itemOptions' => [
            'class' => 'video_list',
        ],

    ]);
?>