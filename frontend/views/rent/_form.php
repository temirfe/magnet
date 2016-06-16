<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Design */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="design-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>



    <?php
    $iniImg=false;
    $initialPreviewConfig=[];
    $key = $model->id;
    $url = Url::to(['rent/img-delete', 'id' => $key]);
    if(!$model->isNewRecord) {
        $iniImg=false;
        if(is_dir("images/rent/".$model->id)){
            $imgs=scandir("images/rent/".$model->id);
            foreach($imgs as $img){
                if($img!='.' && $img!='..' && $img!=$model->main_img && $img!='s_'.$model->main_img){
                    if(strpos($img,'s_' )!== false)
                    {
                        $iniImg[]=Html::img("@web/images/rent/".$model->id."/".$img, ['class'=>'file-preview-image', 'alt'=>'']);
                        $initialPreviewConfig[] = ['width' => '80px', 'url' => $url, 'key' => $img];
                    }
                }
            }
        }

    }
    echo $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*','multiple'=>true],
        'language' => 'ru',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'overwriteInitial'=>false,
            'initialPreview'=>$iniImg,
            'previewFileType' => 'any',
            'uploadUrl' => Url::to(['/rent/img-upload','id'=>$model->id]),
            'initialPreviewConfig' => $initialPreviewConfig,

        ],
    ]); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
