<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CursosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idEscuela') ?>

    <?= $form->field($model, 'idCurso') ?>

    <?= $form->field($model, 'codigoCurso') ?>

    <?= $form->field($model, 'nombreCurso') ?>

    <?php // echo $form->field($model, 'creditos') ?>

    <?php // echo $form->field($model, 'horas') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
