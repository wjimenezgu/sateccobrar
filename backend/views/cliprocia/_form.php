<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Compania;
use backend\models\Tipoclipro;
use backend\models\Estadoclipro;
use backend\models\Clipro;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprocia-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'idCompania')->dropDownList(ArrayHelper::map(Compania::find()->all(),'id','nombre'),['prompt'=>'Seleccione Compañía ..']); ?>   
         
    <!-- <?= $form->field($model, 'idCliPro')->dropDownList(ArrayHelper::map(Clipro::find()->all(),'id','cliProNombre'),['prompt'=>'Seleccione Compañía ..']); ?>    -->
    <?= $form->field($model, 'idCliPro')->widget(Select2::classname(), 
    				[
    					'language' => 'es',
    					'data' => ArrayHelper::map(Clipro::find()->all(),'id','cliProNombre'),
    					'options' => ['placeholder' => 'Seleccione Cliente ..'],
    					'pluginOptions' => ['allowClear' => true],
					]);
    		?>
    		
    		
    <div class="row">
    	<div class="col-sm-3">	   
		    <?= $form->field($model, 'plazoPagCob')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-sm-3">
		    <?= $form->field($model, 'limitePagCob')->widget(MaskMoney::classname(), [
		    				'options' => ['class'=>'text-right'],
						]);
		   			 ?>
		</div>     
		<div class="col-sm-3">
		<!--    <?= $form->field($model, 'idTipoCliPro')->textInput(['maxlength' => true]) ?>   --> 
		    
		    <?= $form->field($model, 'idTipoCliPro')->dropDownList(ArrayHelper::map(Tipoclipro::find()->all(),'id','descripcion'),
    				['prompt'=>'Seleccione Tipo Cliente...']); ?>
		    
	    </div>
    </div>	
    
   <div class="row">
   	<div class="col-sm-3">
	<!--    <?= $form->field($model, 'idEstadoCliPro')->textInput(['maxlength' => true]) ?>   --> 
	        <?= $form->field($model, 'idEstadoCliPro')->dropDownList(ArrayHelper::map(Estadoclipro::find()->all(),'id','descripcion'),
    				['prompt'=>'Seleccione Estado Cliente...']); ?>
	    
	    
	</div>
	<div class="col-sm-6">
	    <?= $form->field($model, 'obsEstadoCliPro')->textInput(['maxlength' => true]) ?>
	 </div>
    </div>	
    


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
