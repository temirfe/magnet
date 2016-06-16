<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Page */

$this->title = $model->title;
?>
<div class="page-view mtop">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= nl2br($model->text) ?>

</div>
