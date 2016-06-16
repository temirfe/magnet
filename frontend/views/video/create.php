<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Video */

$this->title = 'Добавить видео проект';
?>
<div class="video-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
