<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Magnet Production | Контакты';
$this->registerJsFile('http://maps.api.2gis.ru/2.0/loader.js?pkg=full', ['position' => \yii\web\View::POS_HEAD]);
$map_script="
var map;

    DG.then(function () {
        map = DG.map('map', {
            center: [42.850749,74.62192],
            zoom: 15
        });
        DG.marker([42.850749,74.62192]).addTo(map).bindPopup('Magnet Production - переулок Бийский, 1');
    });
";
$this->registerJs($map_script, 1);
$insta=Html::a(Html::img('/images/insta.png'),'https://instagram.com/magnetproduction',['target'=>'_blank','class'=>'social insta', 'title'=>'Instagram']);
$fb=Html::a(Html::img('/images/fb.png'),'https://www.facebook.com/magnetproduction/',['target'=>'_blank','class'=>'social fb', 'title'=>'Facebook']);
$youtube=Html::a(Html::img('/images/youtube.png'),'https://www.youtube.com/channel/UCMbd38CzdZ7esJgIQBkPwfQ',['target'=>'_blank','class'=>'social youtube', 'title'=>'YouTube']);
?>
<div class="site-contact row">
    <div class="col-sm-4">
        <h2>Связаться с нами</h2>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'subject') ?>

        <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-sm-8">

        <div class="text-right font18 pull-left">
            +996 700 911 611<br />
            +996 700 911 611<br />
            +996 700 911 611<br />
            +996 700 911 611<br />
            переулок Бийский 1 (пересекает Скрябина)<br />
            studio@magnet.kg
        </div>
        <div class="ml5">
            <div class="mb5"><?=$insta;?></div>
            <div class="mb5"><?=$fb;?></div>
            <div class="mb5"><?=$youtube;?></div>
        </div>

        <div id="map" style="width:700px; height:400px"></div>
    </div>
</div>