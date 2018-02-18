<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detalle */

$this->title = 'Update Detalle: ' . ' ' . $model->idDetalle;
$this->params['breadcrumbs'][] = ['label' => 'Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDetalle, 'url' => ['view', 'id' => $model->idDetalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
