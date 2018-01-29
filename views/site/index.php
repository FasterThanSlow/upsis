<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Управление планом привлечения сил и средств РБ!</h1>
        <?php if(Yii::$app->user->isGuest): ?>
            <p class="lead">Пожалуйста, авторизируйтесь.</p>
        <?php else:?>
            <p class="lead">Выбирете нужную область.</p>
            <?= Html::ul($regions,['class'=>'list-unstyled', 'item' => function($item,$index){return Html::tag('li',Html::a($item,Url::toRoute(['site/regions','id'=>$index])));}]) ?> 
        <?php endif;?>
         
    </div>
</div>
