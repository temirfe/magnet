<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DesignSearch */
/* @var $models frontend\controllers\DesignController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Magnet Production | Дизайн';
$model=['id'=>2];
?>
<div class="design-index mtop">
    <?php
    /*foreach($models as $model){
        echo $model['main_img'];
    }*/
    $imgs=scandir("images/design/2");
    foreach($imgs as $img){
        if($img!='.' && $img!='..'){
            if(strpos($img,'s_' )!== false)
            {
                $img=Html::img("@web/images/design/".$model['id']."/".$img);
                echo Html::a($img,'#');
            }
        }
    }
    ?>
</div>
