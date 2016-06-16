<?php
use yii\helpers\Html;
?>
<div class="admpanel_top">
    <div class="pull-right admin_toggle"><span class="glyphicon glyphicon-menu-up js_admin_close"></span></div>
    <div class="admpanel-content js_admpanel-content">
      	<div class="top_admpanel_wrapper">
            <div class="operations">
                <div><span class='panel-icon glyphicon glyphicon-text-size'></span><?=Html::a('Текст', array('/page/index')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-picture'></span><?=Html::a('Дизайн', array('/design/admin')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-facetime-video'></span><?=Html::a('Видео', array('/video/admin')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-camera'></span><?=Html::a('Фото', array('/photo/admin')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-globe'></span><?=Html::a('Веб', array('/web/admin')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-text-background'></span><?=Html::a('Аренда', array('/rent/index')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-user'></span><?=Html::a('Пользователи', array('/user/index')); ?></div>
                <div><span class='panel-icon glyphicon glyphicon-off'></span><?=Html::a('Выход', array('/site/logout'),['data'=>['method'=>'post']]); ?></div>
             </div>
             <div class="clear"></div>
                <?php
                $request=Yii::$app->request;
                $id=$request->get('id');
                $action=Yii::$app->controller->action->id;
                if($action=='view')
                {
                    ?>
                    <div class="operations_title"></div>
                    <div class="operations" style="padding: 4px 13px 0;">
                        <?= Html::a('<span class="glyphicon glyphicon-list panel-icon2"></span> Список', ['index'], ['class' => '','style'=>'margin-right:30px;']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-plus panel-icon2"></span> Добавить', ['create'], ['class' => '','style'=>'margin-right:30px;']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-pencil panel-icon2"></span> Редактировать', ['update', 'id' => $id], ['class' => '','style'=>'margin-right:30px;']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-remove panel-icon2"></span> Удалить', ['delete', 'id' => $id], [
                            'data' => [
                                'confirm' => 'Точно хотите удалить?',
                                'method' => 'post',
                            ],'style'=>'margin-right:30px;'
                        ]) ?>
                    </div>
                <?php
                }
                elseif(in_array($action,['index','admin','update']) && Yii::$app->controller->id!='site')
                {
                    ?>
                    <div class="operations_title"></div>
                    <div class="operations" style="padding: 4px 13px 0;">
                        <?= Html::a('<span class="glyphicon glyphicon-list panel-icon2"></span> Список', ['index'], ['class' => '','style'=>'margin-right:30px;']) ?>
                        <?= Html::a('<span class="glyphicon glyphicon-plus panel-icon2"></span> Добавить', ['create'], ['class' => '','style'=>'margin-right:30px;']) ?>
                    </div>
                <?php
                }
                ?>
         </div>
    </div>
</div>  