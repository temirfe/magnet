<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WebSearch */
/* @var $models frontend\controllers\WebController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magnet Production | Webb/App';
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