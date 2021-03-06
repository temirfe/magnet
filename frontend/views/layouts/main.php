<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

$controller=Yii::$app->controller->id;
$action=Yii::$app->controller->action->id;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <?php
    $bg='about.jpg';
    if($controller=='design'){$bg='design.jpg';}
    else if($controller=='video'){$bg='video.jpg';}
    else if($controller=='photo'){$bg='photo.jpg';}
    else if($controller=='web'){$bg='web.jpg';}
    else if($controller=='rent'){$bg='studio.jpg';}
    else if($controller=='site' && $action=='contact'){$bg='contact.jpg';}
    ?>
    <style>
        body{
            background: url('/css/images/<?=$bg?>') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
<?php $this->beginBody() ?>
<?php
if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role=='admin'){include_once('_adminpanel.php');} ?>
<div class="wrap">
    <div class='red_bg'></div>
    <div class="menu_container">
        <?php
        NavBar::begin([
            'brandLabel' => "<img src='/images/logo.png' class='logo' /><img src='/images/mlogo.png' class='mlogo' />",
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-default',
            ],
            'renderInnerContainer'=>false
        ]);

        $menuItems = [
            ['label' => 'О нас', 'url' => ['/site/production']],
            ['label' => 'Дизайн', 'url' => ['/design'], 'active'=>$controller=='design' ? true : false],
            ['label' => 'Видео', 'url' => ['/video'], 'active'=>$controller=='video' ? true : false],
            ['label' => 'Фото', 'url' => ['/photo'], 'active'=>$controller=='photo' ? true : false],
            ['label' => 'Web/App', 'url' => ['/web'], 'active'=>$controller=='web' ? true : false],
            ['label' => 'Аренда студии', 'url' => ['/rent/view','id'=>1]],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
        ];
        echo Nav::widget([
            'options' => ['class' => 'nav-pills nav-stacked'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </div>
    <div class="inner_container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <div class="blue_bg js_blue_bg"></div>
</div>

<?php
if(in_array($controller,['design','photo','web','rent']) && $action=='view')
    include_once(Yii::getAlias('@frontend').'/views/layouts/_swipe.php');
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>