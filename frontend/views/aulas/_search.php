<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AulasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aulas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idSede') ?>

    <?= $form->field($model, 'idAula') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'capacidad') ?>

    <?php // echo $form->field($model, 'idTipoAula') ?>

    <?php // echo $form->field($model, 'localizacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
