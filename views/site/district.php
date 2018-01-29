<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = $name.' район';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$name?> район</h1>
        <p class="lead">Выбирете нужный населенный пункт.</p>
        <?= Html::ul($localities,['class'=>'list-unstyled', 'item' => function($item,$index){return Html::tag('li',Html::a($item,Url::toRoute(['units/index','localities_id'=>$index])));}]) ?>  
    </div>
</div>