<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Video */

$this->title = 'Magnet | '.$model->title;

$dao=Yii::$app->db;
$prev = $dao->createCommand("SELECT * FROM video WHERE id < '{$model->id}' ORDER BY id DESC LIMIT 1")->queryOne();
$next = $dao->createCommand("SELECT * FROM video WHERE id > '{$model->id}' ORDER BY id LIMIT 1")->queryOne();

if(!$prev) $prev = $dao->createCommand("SELECT * FROM video WHERE id <> '{$model->id}' ORDER BY id DESC LIMIT 1")->queryOne();
if(!$next) $next = $dao->createCommand("SELECT * FROM video WHERE id <> '{$model->id}' ORDER BY id LIMIT 1")->queryOne();

if($prev && $prev['id']!=$next['id']) {
    if($prev['main_img']){
        $img1=Html::img('/images/video/'.$prev['id'].'/'.$prev['main_img']);
    }
    else if($prev['thumb_url'])
    {
        $img1=Html::img($prev['thumb_url']);
    }
    if(isset($img1))
        $link1=Html::a('<div class="col_cover"></div>'.$img1,['/video/view','id'=>$prev['id']],['title'=>$prev['title']]);
}
if($next && $next['id']!=$prev['id']) {
    if($next['main_img']){
        $img3=Html::img('/images/video/'.$next['id'].'/'.$next['main_img']);
    }
    else if($next['thumb_url'])
    {
        $img3=Html::img($next['thumb_url']);
    }
    if(isset($img3))
        $link3=Html::a('<div class="col_cover"></div>'.$img3,['/video/view','id'=>$next['id']],['title'=>$next['title']]);
}

?>
<style>
    .inner_container{ margin-left: 185px;
        padding-right: 185px;
        width: 100%;    margin-top: -170px;}
</style>
<div class="video-view mtop2">
    <div class="cols_wrap">
        <div class="video_col pull-left">
            <h1 class="mt0 vh">..</h1>
            <div class="desc font18 vh mb10">..</div>
            <?php if(!empty($link1)) echo $link1; ?>
        </div>
        <div class="video_col pull-left">
            <h1 class="mt0 text-right"><?= Html::encode($model->title) ?></h1>
            <div class="desc font18 text-right mb10"><?=$model->description;?></div>
            <?php //=Html::img('/images/video/'.$model->id.'/'.$model->main_img) ?>
            <?=$model->embed ?>
            <div class="mt15"><?=nl2br($model->text) ?></div>
        </div>
        <div class="video_col pull-left">
            <h1 class="mt0 vh">..</h1>
            <div class="desc font18 vh mb10">..</div>
            <?php if(!empty($link3)) echo $link3; ?>
        </div>
    </div>

</div>
