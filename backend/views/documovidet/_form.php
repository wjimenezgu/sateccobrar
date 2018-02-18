<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Documovidet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documovidet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecIns')->textInput() ?>

    <?= $form->field($model, 'userIns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idDocMaestro')->textInput() ?>

    <?= $form->field($model, 'idDocAplica')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
