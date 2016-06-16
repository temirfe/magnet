<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Photo */

$this->title = 'Добавить альбом';
?>
<div class="photo-create mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
