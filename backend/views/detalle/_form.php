<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Detalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idMaestro')->textInput() ?>

    <?= $form->field($model, 'idAplica')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecAplica')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
