<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Entidadtelefono */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entidadtelefono-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEntidad')->textInput() ?>

    <?= $form->field($model, 'idTipoTelefono')->textInput() ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
