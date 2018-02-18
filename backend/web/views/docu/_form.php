<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Docu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idTipoDocumento')->textInput() ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idEstadoDocumento')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecIns')->textInput() ?>

    <?= $form->field($model, 'userIns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'saldo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idCliProCia')->textInput() ?>

    <?= $form->field($model, 'idMoneda')->textInput() ?>

    <?= $form->field($model, 'fecVence')->textInput() ?>

    <?= $form->field($model, 'fecMod')->textInput() ?>

    <?= $form->field($model, 'userMod')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
