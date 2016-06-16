<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Аренда';
?>
<div class="rent-index mtop">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'=>'id',
                'headerOptions' => ['width' => '50']
                //'value'=>function($model){return $model->category->title;},
            ],
            [
                'attribute'=>'text',
                'value'=>function($model){return StringHelper::truncate($model->text, 100);}
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
