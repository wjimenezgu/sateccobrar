<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CliprotrampagcobSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprotrampagcob-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idCliPro') ?>

    <?= $form->field($model, 'idDia') ?>

    <?= $form->field($model, 'idTramitePagCob') ?>

    <?= $form->field($model, 'horaInicia') ?>

    <?php // echo $form->field($model, 'horaFin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
