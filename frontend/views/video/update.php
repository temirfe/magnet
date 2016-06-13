<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Video */

$this->title = 'Редактировать: ' . $model->title;
?>
<div class="video-update mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
