<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Web */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php
    $initialPreviewConfig =[];
    if(!$model->isNewRecord && $main_img=$model->main_img) {
        $iniImg=[Html::img("@web/images/web/".$model->id."/s_".$main_img, ['class'=>'file-preview-image', 'alt'=>''])];
        $url=Url::to(['web/img-delete', 'id' => $model->id]);
        $initialPreviewConfig[] = ['width' => '80px', 'url' => $url, 'key' => "s_".$main_img];
    }
    else {
        $iniImg=false;
    }
    echo $form->field($model, 'imageFile')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'language' => 'ru',
        'pluginOptions' => [
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,
            'initialPreview'=>$iniImg,
            'previewFileType' => 'any',
            'uploadUrl' => Url::to(['/web/img-upload','id'=>$model->id]),
            'initialPreviewConfig' => $initialPreviewConfig,
        ],
    ]); ?>

    <?php
    $iniImg=false;
    $initialPreviewConfig=[];
    $key = $model->id;
    $url = Url::to(['web/img-delete', 'id' => $key]);
    if(!$model->isNewRecord) {
        $iniImg=false;
        if(is_dir("images/web/".$model->id)){
            $imgs=scandir("images/web/".$model->id);
            foreach($imgs as $img){
                if($img!='.' && $img!='..' && $img!=$model->main_img && $img!='s_'.$model->main_img){
                    if(strpos($img,'s_' )!== false)
                    {
                        $iniImg[]=Html::img("@web/images/web/".$model->id."/".$img, ['class'=>'file-preview-image', 'alt'=>'']);
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
            'uploadUrl' => Url::to(['/web/img-upload','id'=>$model->id]),
            'initialPreviewConfig' => $initialPreviewConfig,

        ],
    ]); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
