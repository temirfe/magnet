<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Magnet Production';

$dao=Yii::$app->db;
$text= $dao->createCommand("SELECT text FROM page WHERE title='about'")->queryScalar();
?>
<div class="site-about mtop text-center roboto font20 lh30 white underline mcenter mw735">
    <?=nl2br($text)?>
</div>
