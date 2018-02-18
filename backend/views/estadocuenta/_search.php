<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EstadocuentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadocuenta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCliPro') ?>

    <?= $form->field($model, 'idCompania') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'plazoPagCob') ?>

    <?php // echo $form->field($model, 'limitePagCob') ?>

    <?php // echo $form->field($model, 'idTipoCliPro') ?>

    <?php // echo $form->field($model, 'idEstadoCliPro') ?>

    <?php // echo $form->field($model, 'obsEstadoCliPro') ?>

    <?php // echo $form->field($model, 'fecModEstadoCliPro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
