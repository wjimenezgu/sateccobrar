<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CliprocuentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprocuenta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cuentaCliente') ?>

    <?= $form->field($model, 'cuenta') ?>

    <?= $form->field($model, 'idBanco') ?>

    <?= $form->field($model, 'idMoneda') ?>

    <?php // echo $form->field($model, 'idCliPro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
