<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WebSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Web/App';
?>
<div class="design-index mtop">

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
                'attribute' => 'main_img',
                'format' => 'raw',
                'value' => function($model) {
                    if($model->main_img) $img="@web/images/web/".$model->id."/s_".$model->main_img;
                    else $img='';
                    return Html::img($img,['style'=>'width:80px;']);
                },
                'headerOptions' => ['width' => '100']
            ],
            'title',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
