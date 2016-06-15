<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Rent */

$this->title = 'Редактировать: ' . $model->id;
?>
<div class="rent-update mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
