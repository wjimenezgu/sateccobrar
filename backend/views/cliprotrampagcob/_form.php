<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliprotrampagcob */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprotrampagcob-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idCliPro')->textInput() ?>

    <?= $form->field($model, 'idDia')->textInput() ?>

    <?= $form->field($model, 'idTramitePagCob')->textInput() ?>

    <?= $form->field($model, 'horaInicia')->textInput() ?>

    <?= $form->field($model, 'horaFin')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
