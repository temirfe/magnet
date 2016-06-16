<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PhotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magnet Production | Фото';
?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'summary'=>'',
    'options' => [
        'class' => 'design-index mtop',
    ],'itemOptions' => [
        'class' => 'photo-item mb20',
    ],

]);
?>
