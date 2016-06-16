<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DesignSearch */
/* @var $models frontend\controllers\DesignController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magnet Production | Дизайн';
?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'summary'=>'',
    'options' => [
        'class' => 'design-index mtop',
    ],'itemOptions' => [
        'class' => 'col-sm-6 pr0 pl0 col-md-4 col-xs-6',
    ],

]);
?>