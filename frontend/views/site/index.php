<?php

/* @var $this yii\web\View */

$this->title = 'Magnet Production';
?>
<style>

    body{
        margin:0;
        overflow: hidden;
        background: url(/css/images/entry.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    @keyframes rot {
        from {transform: rotate(0deg) translate(189px) rotate(0deg);}
        to {transform: rotate(360deg) translate(189px) rotate(-360deg);}
    }
    @keyframes rot2 {
        from {transform: rotate(0deg) translate(-189px)rotate(0deg);}
        to {transform: rotate(360deg) translate(-189px) rotate(-360deg);}
    }
    @keyframes dev {
        0% {transform: rotate(0deg)translate(290px)rotate(0deg);}

        /*20% {transform: rotate(50deg) translate(260px) rotate(-50deg);}
        21% {transform: rotate(55deg) translate(250px) rotate(-55deg);}
        22% {transform: rotate(65deg) translate(240px) rotate(-65deg);}
        23% {transform: rotate(75deg) translate(235px) rotate(-75deg);}
        24% {transform: rotate(70deg) translate(230px) rotate(-70deg);}*/

        25% {transform: rotate(90deg) translate(225px) rotate(-90deg);}

        50% {transform: rotate(180deg) translate(290px) rotate(-180deg);}

        75% {transform: rotate(270deg) translate(225px) rotate(-270deg);}

        100% {transform: rotate(360deg) translate(290px) rotate(-360deg);}
    }
    @keyframes prod {
        0% {transform: rotate(0deg)translate(-280px)rotate(0deg);}
        25% {transform: rotate(90deg) translate(-225px) rotate(-90deg);}
        50% {transform: rotate(180deg) translate(-280px) rotate(-180deg);}
        75% {transform: rotate(270deg) translate(-225px) rotate(-270deg);}
        100% {transform: rotate(360deg) translate(-280px) rotate(-360deg);}
    }

    .circle{
        border: 3px solid white;
        border-radius: 195px;
        height: 380px;
        margin: 10% auto 0;
        width: 380px;
        position:relative;
    }
    .dot{
        border: 3px solid white;
        background-color: #142029;
        border-radius: 16px;
        box-sizing: content-box;
        height: 4px;
        left: 50%;
        margin-left: -5px;
        margin-top: -5px;
        position: absolute;
        top: 50%;
        width: 4px;
    }
    .dot1{animation: rot 50s linear infinite;}
    .dot2{animation: rot2 50s linear infinite;}
    .word{
        height: 34px;
        left: 50%;
        position: absolute;
        top: 50%;
    }
    .dev{
        background-image: url("/css/images/dev.png");
        background-repeat: no-repeat;
        background-size: 172px auto;
        margin-left: -87px;
        margin-top: -17px;
        width: 174px;
        animation: dev 50s linear infinite;

    }

    .prod{
        background-image: url("/css/images/prod.png");
        background-position: 0 2px;
        background-repeat: no-repeat;
        background-size: 148px auto;
        margin-left: -75px;
        margin-top: -17px;
        width: 150px;
        animation: prod 50s linear infinite;
    }
    .word a{ display: block;
        height: 100%;
        opacity: 0;
        width: 100%;}
    .dot3{border-color:#80393C;}
    .mlogo{left: 50%;
        margin-left: -145px;
        margin-top: -40px;
        position: absolute;
        top: 50%;
        width: 290px;}
    
    /*.circle:hover .dot1, .circle:hover .dot2, .circle:hover .dev, .circle:hover .prod
    {
        -webkit-animation-play-state: paused;
        -moz-animation-play-state: paused;
        -o-animation-play-state: paused;
        animation-play-state: paused;
    }*/
</style>
<div class="site-index">

    <div class="circle">
        <div class="dot dot1 js_dot1"></div>
        <div class="word dev js_dev"><a href="#">DEVELOPMENT</a></div>
        <div class="word prod js_prod"><a href="#">PRODUCTION</a></div>
        <div class="dot dot2 js_dot2"></div>
        <img src="/images/mlogo.png" class="mlogo" />
    </div>

    <!--<div class="smile">development</div>-->
</div>
