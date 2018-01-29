<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnitsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Подразделения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="units-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if(Yii::$app->user->id == 100): ?>
        <p>
            <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif;?>
   
    <?php 
    if(Yii::$app->user->id == 100){
        $columns = [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'method_of_calling',
            'distance',
            'spec_vehicle',
            // 'localities_id',
            // 'is_field_unit',

            ['class' => 'yii\grid\ActionColumn'],
        ];
    }
    else{
         $columns = [['class' => 'yii\grid\SerialColumn'],

            'name',
            'method_of_calling',
            'distance',
            'spec_vehicle',
            // 'localities_id',
            // 'is_field_unit',

            //['class' => 'yii\grid\ActionColumn'],
        ];
    }
    
    ?>    
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns
    ]); ?>
</div>
