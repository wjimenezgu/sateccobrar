<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanescursosreqcorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planescursosreqcor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idEscuela') ?>

    <?= $form->field($model, 'idCarrera') ?>

    <?= $form->field($model, 'idPlanEstudio') ?>

    <?= $form->field($model, 'idCurso') ?>

    <?php // echo $form->field($model, 'idCursoReqCor') ?>

    <?php // echo $form->field($model, 'idIndReqCor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
