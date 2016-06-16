<?php

use yii\helpers\Html;
use frontend\assets\PhotoSwipeAsset;

PhotoSwipeAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Design */

$this->title = 'Magnet | '.$model->title;
?>
<div class="row mtop2 mb20">
    <div class="text-right col-sm-8">
        <h1 class="mt0 mb0"><?= Html::encode($model->title) ?></h1>
        <div class="desc font18"><?=$model->description;?></div>
    </div>
</div>
<div class="design-view row mb60">
    <div class="col-sm-8 mt6">
        <?php
        if(is_dir("images/web/".$model->id)){
            if($model->main_img){
                $img=Html::img("@web/images/web/".$model->id."/".$model->main_img, ['class'=>'img-responsive design-img js_img', 'alt'=>'']);
                echo Html::a($img,'#',['class'=>'js_photo_swipe','data-index'=>0]);
            }
            $imgs=scandir("images/web/".$model->id);
            foreach($imgs as $key=>$img){
                $key--;
                if($img!='.' && $img!='..' && $img!=$model->main_img && $img!='s_'.$model->main_img){
                    if(strpos($img,'s_' )=== false)
                    {
                        $img=Html::img("@web/images/web/".$model->id."/".$img, ['class'=>'img-responsive design-img js_img', 'alt'=>'']);
                        echo Html::a($img,'#',['class'=>'js_photo_swipe','data-index'=>$key]);
                    }
                }
            }
        }
        ?>
    </div>
    <div class="col-sm-4 text-justify"><?=nl2br($model->text);?></div>
</div>
