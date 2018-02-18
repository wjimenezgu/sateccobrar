<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprocuenta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cuentaCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idBanco')->textInput() ?>

    <?= $form->field($model, 'idMoneda')->textInput() ?>

    <?= $form->field($model, 'idCliPro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
