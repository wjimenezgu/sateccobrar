<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TalonarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talonario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'numeroInicial') ?>

    <?= $form->field($model, 'numeroFinal') ?>

    <?= $form->field($model, 'idCompania') ?>

    <?php // echo $form->field($model, 'idMensajero') ?>

    <?php // echo $form->field($model, 'idEstadoTalonario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
