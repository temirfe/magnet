<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\VideoSearch */
$dir=Yii::getAlias('@webroot')."/images/photo/".$model->id;
$photos=scandir($dir);
foreach($photos as $photo){
    if(is_file($dir.'/'.$photo) && strpos($photo,'s_')!==false){
        $img=Html::img("@web/images/photo/".$model->id."/".$photo,['class'=>'img-responsive']);
        echo "<div class='col-sm-3 pr0 pl0 col-md-3 col-xs-6'>".Html::a($img,['/photo/view','id'=>$model->id],['class'=>'img-responsive'])."</div>";
    }
}
echo Html::a("<div class='font28'>".$model->title."</div>",['/photo/view','id'=>$model->id],['class'=>'mt10 iblock white'])
?>
