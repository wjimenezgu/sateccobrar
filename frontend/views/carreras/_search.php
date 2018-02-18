<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarrerasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carreras-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idEscuela') ?>

    <?= $form->field($model, 'idCarrera') ?>

    <?= $form->field($model, 'idGrado') ?>

    <?= $form->field($model, 'nombreCarrera') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
