<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Debicredi;

/* @var $this yii\web\View */
/* @var $model backend\models\Tipodocumento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipodocumento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siglas')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'idDebiCredi')->textInput() ?> -->
    <?= $form->field($model, 'idDebiCredi')->dropDownList(ArrayHelper::map(Debicredi::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Tipo ..']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
