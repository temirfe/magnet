<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Design */

$this->title = 'Добавить дизайн проект';
?>
<div class="design-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
