<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $name.' область';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$name?> область</h1>
        <p class="lead">Выбирете нужный район.</p>
        <?= Html::ul($districts,['class'=>'list-unstyled', 'item' => function($item,$index){return Html::tag('li',Html::a($item,Url::toRoute(['site/districts','id'=>$index])));}]) ?>  
    </div>
</div>