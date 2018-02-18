<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Compania;
use backend\models\Estadotalonario;
use backend\models\Mensajero;

/* @var $this yii\web\View */
/* @var $model backend\models\Talonario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="talonario-form">

    <?php $form = ActiveForm::begin(); ?>
    
  <!--  <?= $form->field($model, 'idCompania')->textInput() ?>  --> 
    <?= $form->field($model, 'idCompania')->dropDownList(ArrayHelper::map(Compania::find()->all(),'id','nombre'),['prompt'=>'Seleccione Compañía ..']); ?>   
    
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numeroInicial')->textInput() ?>

    <?= $form->field($model, 'numeroFinal')->textInput(['maxlength' => true]) ?>

  <!--   <?= $form->field($model, 'idMensajero')->textInput() ?>   -->
    <?= $form->field($model, 'idMensajero')->dropDownList(ArrayHelper::map(Mensajero::find()->all(),'id','nombreCompleto'),['prompt'=>'Seleccione Mensajero ..']); ?>

  <!--  <?= $form->field($model, 'idEstadoTalonario')->textInput() ?>  --> 
    <?= $form->field($model, 'idEstadoTalonario')->dropDownList(ArrayHelper::map(Estadotalonario::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Talonario ..']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
