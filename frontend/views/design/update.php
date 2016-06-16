<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Design */

$this->title = 'Редактировать: ' . $model->title;
?>
<div class="design-update mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
