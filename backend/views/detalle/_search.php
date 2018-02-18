<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetalleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idDetalle') ?>

    <?= $form->field($model, 'idMaestro') ?>

    <?= $form->field($model, 'idAplica') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'fecAplica') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
