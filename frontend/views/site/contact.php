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

$dao=Yii::$app->db;
$text= $dao->createCommand("SELECT text FROM page WHERE title='contact'")->queryScalar();
?>
<div class="site-contact row">
    <div class="col-sm-4 mtop pr50">
        <h2 class="mt0 mb20">Связаться с нами</h2>
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <?= $form->field($model, 'name')->textInput(['placeholder'=>'Ваше имя']) ?>

        <?= $form->field($model, 'email')->textInput(['placeholder'=>'Ваш e-mail'])  ?>

        <?= $form->field($model, 'subject')->textInput(['placeholder'=>'Ваш телефон']) ?>

        <?= $form->field($model, 'body')->textArea(['rows' => 6,'placeholder'=>'Ваше сообщение']) ?>

        <?= $form->field($model, 'verifyCode',['options'=>['class'=>'js_form_hidden form-group hidn']])->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-lg-5">{image}</div><div class="col-lg-6">{input}</div></div>',
        ]) ?>

        <div class="form-group js_form_hidden hidn">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    <div class="col-sm-8 mt32">

        <div class="pull-right ml25">
            <div class="mb10"><?=$insta;?></div>
            <div class="mb10"><?=$fb;?></div>
            <div class="mb10"><?=$youtube;?></div>
        </div>
        <div class="text-right font18 phones mb25">
            <?=nl2br($text)?>
        </div>

        <div id="map" style="width:700px; height:400px"></div>
    </div>
</div>