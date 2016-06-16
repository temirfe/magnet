<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VideoSearch */

$img='';
if($model->main_img) $img=Html::img('/images/video/'.$model->id.'/'.$model->main_img,['class'=>'img-responsive']);
else if($model->thumb_url) $img=Html::img($model->thumb_url,['class'=>'img-responsive']);
if($img){
    $img.="<div class='title_hidden abs js_title_hidden'>".$model->title."</div><div class='title_bg abs js_title_bg'></div>";
    echo Html::a($img,['/video/view','id'=>$model->id],['class'=>'img-responsive js_des_list_img']);
}
?>
