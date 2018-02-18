<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModalidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modalidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idModalidad') ?>

    <?= $form->field($model, 'descModalidad') ?>

    <?= $form->field($model, 'descBloquePlan') ?>

    <?= $form->field($model, 'cantMeses') ?>

    <?php // echo $form->field($model, 'anioInicioPeriodo') ?>

    <?php // echo $form->field($model, 'ultAnioGenPeriodo') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
