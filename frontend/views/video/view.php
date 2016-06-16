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

if($model->main_img) $img2=Html::img('/images/video/'.$model->id.'/'.$model->main_img);
else if($model->thumb_url) $img2=Html::img($model->thumb_url);
else $img2='';

?>
<style>
    .inner_container{ margin-left: 185px;
        padding-right: 185px;
        width: 100%;    margin-top: -170px;}

    @media (max-width: 1090px) {
        .cols_wrap .video_col:nth-child(1), .cols_wrap .video_col:nth-child(3) {display: none;}

        .video_col { padding: 0 10px;  }
    }
    @media (max-width: 768px) {
        .inner_container{padding:0; margin:0;}
        .mtop2{margin:0;}
        .video_col {
            margin-right: 0;
            width: 100%;
        }
        .cols_wrap {
            width: 100%;
        }
        .col_emb {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }
        .col_emb iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video_col img {display: none;}
    }
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
            <div class="rel">
                <?php echo $img2; ?>
                <div class="col_emb"><?=$model->embed ?></div>
            </div>
            <div class="mt15 text-justify"><?=nl2br($model->text) ?></div>
        </div>
        <div class="video_col pull-left">
            <h1 class="mt0 vh">..</h1>
            <div class="desc font18 vh mb10">..</div>
            <?php if(!empty($link3)) echo $link3; ?>
        </div>
    </div>

</div>
