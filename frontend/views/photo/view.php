<?php

use yii\helpers\Html;
use frontend\assets\PhotoSwipeAsset;
use frontend\assets\SwiperAsset;

PhotoSwipeAsset::register($this);
SwiperAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Photo */

$this->title = 'Magnet | '.$model->title;
?>
<style>
    .inner_container{ margin-left: 185px;
        padding-right: 185px;
        width: 100%;    margin-top: -170px;}
</style>
<div class="photo-view mtop2">

    <h1><?= Html::encode($model->title) ?></h1>
<?php
    $dir=Yii::getAlias('@webroot')."/images/photo/".$model->id;
    $photos=scandir($dir);
    foreach($photos as $photo){
        if(is_file($dir.'/'.$photo) && strpos($photo,'s_')===false){
            $img=Html::img("@web/images/photo/".$model->id."/".$photo,['class'=>'iblock']);
            echo "<div class='photo_car'>".Html::a($img,['/photo/view','id'=>$model->id],['class'=>'img-responsive'])."</div>";
        }
    }
    //echo Html::a("<div class='font28'>".$model->title."</div>",['/photo/view','id'=>$model->id],['class'=>'mt10 iblock white']);
    echo "<div class='clear'></div><p>".$model->text."</p>";
?>

</div>
