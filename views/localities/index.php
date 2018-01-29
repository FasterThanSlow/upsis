<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LocalitiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Населенные пункты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="localities-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'selsovet',
            'districts_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
