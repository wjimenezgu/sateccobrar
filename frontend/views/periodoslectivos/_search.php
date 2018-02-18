<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeriodoslectivosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodoslectivos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idModalidad') ?>

    <?= $form->field($model, 'idPeriodoLectivo') ?>

    <?= $form->field($model, 'fecIniPeriodoNatu') ?>

    <?= $form->field($model, 'fecFinPeriodoNatu') ?>

    <?= $form->field($model, 'fechaInicioPeriodo') ?>

    <?php // echo $form->field($model, 'fechaFinPeriodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
