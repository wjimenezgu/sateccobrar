<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GradosacademicosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gradosacademicos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idInstitucion') ?>

    <?= $form->field($model, 'idGrado') ?>

    <?= $form->field($model, 'nombreGrado') ?>

    <?= $form->field($model, 'siglasGrado') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
