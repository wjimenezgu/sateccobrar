<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanesestudioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planesestudio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idEscuela') ?>

    <?= $form->field($model, 'idCarrera') ?>

    <?= $form->field($model, 'idPlanEstudio') ?>

    <?= $form->field($model, 'nombrePlanEstudio') ?>

    <?php // echo $form->field($model, 'idInstitucionPlan') ?>

    <?php // echo $form->field($model, 'idModalidad') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'fechaAprobacion') ?>

    <?php // echo $form->field($model, 'numSesionAprobacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
