<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\WebSearch */

$img=Html::img("@web/images/web/".$model->id."/s_".$model->main_img,['class'=>'img-responsive']);
$img.="<div class='title_hidden abs js_title_hidden'>".$model->title."</div><div class='title_bg abs js_title_bg'></div>";
echo Html::a($img,['/web/view','id'=>$model->id],['class'=>'img-responsive rel js_des_list_img']);
?>
