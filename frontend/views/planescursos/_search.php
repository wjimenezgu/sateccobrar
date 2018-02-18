<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanescursosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planescursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idEscuela') ?>

    <?= $form->field($model, 'idCarrera') ?>

    <?= $form->field($model, 'idPlanEstudio') ?>

    <?= $form->field($model, 'idCurso') ?>

    <?php // echo $form->field($model, 'codigoCursoPlan') ?>

    <?php // echo $form->field($model, 'nombreCursoPlan') ?>

    <?php // echo $form->field($model, 'nivel') ?>

    <?php // echo $form->field($model, 'posOrden') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
