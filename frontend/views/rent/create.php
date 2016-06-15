<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Rent */

$this->title = 'Добавить аренду';
?>
<div class="rent-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
