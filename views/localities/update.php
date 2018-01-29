<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Localities */

$this->title = 'Update Localities: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Localities', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'districts_id' => $model->districts_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="localities-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
