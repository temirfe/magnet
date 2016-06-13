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
    /*$imgs=scandir("images/design/2");
    foreach($imgs as $img){
        if($img!='.' && $img!='..'){
            if(strpos($img,'s_' )!== false)
            {
                //$img="<div class='title_bg'>".Html::img("@web/images/design/".$model['id']."/".$img,['class'=>'img-responsive'])."</div>";
                $img=Html::img("@web/images/design/".$model['id']."/".$img,['class'=>'img-responsive']);
                $img.="<div class='title_hidden abs js_title_hidden'>Название проекта</div><div class='title_bg abs js_title_bg'></div>";
                echo "<div class='col-sm-6 pr0 pl0 col-md-4 col-xs-6'>".Html::a($img,'#',['class'=>'img-responsive rel js_des_list_img'])."</div>";
            }
        }
    }*/
    ?>
    <!--<iframe src="//vk.com/video_ext.php?oid=60750650&id=456239017&hash=400083fb758b3b6b&hd=2" width="853" height="480"  frameborder="0"></iframe>
    <iframe width="640" height="360" src="https://www.youtube.com/embed/of0t9VTdNvM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>-->
</div>
