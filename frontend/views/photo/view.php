<?php

use yii\helpers\Html;
use frontend\assets\PhotoSwipeAsset;
use frontend\assets\SwiperAsset;

PhotoSwipeAsset::register($this);
SwiperAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Photo */

$this->title = 'Magnet | '.$model->title;

$dir=Yii::getAlias('@webroot')."/images/photo/".$model->id;
$photos=scandir($dir);
?>
<style>
    .inner_container{ margin-left: 185px;
        padding-right: 185px;
        width: 100%;    margin-top: -170px;}
    @media (max-width: 768px) {
        .inner_container{padding:0; margin:0;}
        .mtop2{margin:0;}
        h1{font-size: 26px;}
        .swiper-container {
            height: 150px;
        }
        .st68 {
            margin: 10px 0 0 10px;
            width: 100%;
        }
    }
    @media (max-width: 468px) {
        .swiper-container {
            height: 80px;
        }
    }
</style>
<div class="photo-view mtop2">
    <div class="text-right st67"><h1><?= Html::encode($model->title) ?></h1></div>

    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            <?php
            $i=0;
            foreach($photos as $photo){
                if(is_file($dir.'/'.$photo) && strpos($photo,'s_')===false){
                    $img_url='/images/photo/'.$model->id.'/'.$photo;
                    echo "<div class='swiper-slide js_img' style='background-image:url({$img_url})' src='{$img_url}'><a class='js_photo_swipe open_swipe' data-index='{$i}'></a></div>";
                    $i++;
                }
            }
            ?>
        </div>
    </div>
    <div class='clear'></div>
    <div class="st68 text-justify"><p><?=$model->text?></p></div>
</div>

