<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Page */

$this->title = 'Создать текст';
?>
<div class="page-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
