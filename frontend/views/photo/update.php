<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Photo */

$this->title = 'Редактировать: ' . $model->title;
?>
<div class="photo-update mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
