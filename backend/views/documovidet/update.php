<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Documovidet */

$this->title = 'Update Documovidet: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Documovidets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documovidet-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
