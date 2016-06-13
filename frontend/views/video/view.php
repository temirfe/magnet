<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Video */

$this->title = 'Magnet | '.$model->title;
?>
<div class="video-view mtop">

    <h1><?= Html::encode($model->title) ?></h1>

    <?=$model->embed ?>

</div>
