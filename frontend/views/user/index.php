<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
?>
<div class="user-index mtop">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute'=>'id',
                'headerOptions' => ['width' => '50']
                //'value'=>function($model){return $model->category->title;},
            ],
            'username',
             'email:email',
             'status',
            // 'created_at',
            // 'updated_at',
             'role',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
