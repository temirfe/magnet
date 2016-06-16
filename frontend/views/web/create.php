<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Web */

$this->title = 'Добавить проект';
?>
<div class="web-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
