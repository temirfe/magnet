<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class='red_bg'></div>
    <?php
    NavBar::begin([
        'brandLabel' => "<img src='/images/logo.png' class='logo' /><img src='/images/mlogo.png' class='mlogo' />",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
        'renderInnerContainer'=>false
    ]);
    $menuItems = [
        ['label' => 'О нас', 'url' => ['/site/production']],
        ['label' => 'Дизайн', 'url' => ['/design']],
        ['label' => 'Видео', 'url' => ['/video']],
        ['label' => 'Фото', 'url' => ['/photo']],
        ['label' => 'Web/App', 'url' => ['/web']],
        ['label' => 'Аренда студии', 'url' => ['/rent']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'nav-pills nav-stacked'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    <div class="blue_bg js_blue_bg"></div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
