<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Modalidad;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Periodoslectivos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodoslectivos-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model,'idModalidad')->dropDownList(ArrayHelper::map(Modalidad::find()->all(),'idModalidad','descModalidad'),['prompt'=>'Seleccione Modalidad']); ?>    

    <?= $form->field($model, 'idPeriodoLectivo')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fecIniPeriodoNatu')->textInput() ?>
    
    
    <?= $form->field($model, 'fecFinPeriodoNatu')->widget(
    	DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
      //  'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
	]);?>

    
    <?= $form->field($model, 'fechaInicioPeriodo')->widget(
    	DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
      //  'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
	]);?>    
    
    <?= $form->field($model, 'fechaFinPeriodo')->widget(
    	DatePicker::className(), [
        // inline too, not bad
         'inline' => false, 
         // modify template for custom rendering
      //  'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy'
        ]
	]);?>      

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
