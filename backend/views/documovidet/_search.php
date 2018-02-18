<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocumovidetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documovidet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'fecIns') ?>

    <?= $form->field($model, 'userIns') ?>

    <?= $form->field($model, 'idDocMaestro') ?>

    <?php // echo $form->field($model, 'idDocAplica') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
