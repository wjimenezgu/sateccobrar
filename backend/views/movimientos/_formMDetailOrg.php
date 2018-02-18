<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipodocumento;
use backend\models\Estadodocumento;
use backend\models\Moneda;
use backend\models\Cliprocia;
use backend\models\Documento;
/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimientos-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

 	<div class="row">
 		<div class="col-sm-6">     
    	<!-- <?= $form->field($model, 'idCliProCia')->textInput() ?>   -->	
    	<!-- <?= $form->field($model, 'idCliProCia')->dropDownList(ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),['prompt'=>'Seleccione Cliente']); ?>   -->	
    		<?= $form->field($model, 'idCliProCia')->widget(Select2::classname(), [
			    'language' => 'es',
			    'data' => ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),
			    'options' => ['placeholder' => 'Seleccione Cliente ..'],
			    'pluginOptions' => [
			        'allowClear' => true
    						],
				]);
    		?>
    		
    		
    		
    	</div>	
 		<div class="col-sm-3">     
    		<?= $form->field($model, 'idTipoDocumento')->dropDownList(ArrayHelper::map(Tipodocumento::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Tipo ...']); ?>
    	</div>
		<div class="col-sm-3">     
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>
    	</div>
 	</div>	
	<div class="row">
		<div class="col-sm-3">         		
    			<?= $form->field($model, 'fecha')->widget(DateControl::classname(), [
    			'type'=>DateControl::FORMAT_DATE,
    		//	'value'=>date('d/m/yyyy'),
    			'options' => [
    				'pluginOptions' => [
    						'autoclose' => true
    				],
    			]
				]); ?>
 		</div>	
		<div class="col-sm-3">     	
   	<!-- 	 <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>  -->	
   			 <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
		<div class="col-sm-3">         		    		
    		<?= $form->field($model, 'idEstadoDocumento')->dropDownList(ArrayHelper::map(Estadodocumento::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Estado ...']); ?>
   		</div>
		<div class="col-sm-3">   
    		<?= $form->field($model, 'idMoneda')->dropDownList(ArrayHelper::map(Moneda::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Moneda ...']); ?>
		</div>
	</div>	
	<div class="row">  			
  			<?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
	</div>
	
	
	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 15, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsDocumovidet[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idDocAplica',
        	'monto',
        	'fecIns',
        	'userIns',	

        ],
    ]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-envelope"></i> Movimientos
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
            <?php foreach ($modelsDocumovidet as $i => $modelDocumovidet): ?>
                <div class="item panel panel-default"><!-- widgetItem -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Movimiento</h3>
                        <div class="pull-right">
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDocumovidet->isNewRecord) {
                                echo Html::activeHiddenInput($modelDocumovidet, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-3">
                             <!--   <?= $form->field($modelDocumovidet, "[{$i}]idDocAplica")->textInput(['maxlength' => true]) ?>  --> 
                                <?= $form->field($modelDocumovidet, "[{$i}]idDocAplica")->dropDownList(
                                		ArrayHelper::map(Documento::find()->where(['idCliProCia' => $model->idCliProCia])->andWhere(['!=','id',$model->id])->orderBy('numero')->all(),'id','numero'),
                                		['prompt'=>'Seleccione Documento ..']); 
                                ?>   
                            </div>
                            <div class="col-sm-3">
                           <!-- <?= $form->field($modelDocumovidet, "[{$i}]monto")->textInput(['maxlength' => true]) ?>   -->  
                                <?= $form->field($modelDocumovidet, "[{$i}]monto")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right'],
									]);
    							?>
                            </div>
                            <div class="col-sm-3">
                        <!--    <?= $form->field($modelDocumovidet, "[{$i}]fecIns")->textInput(['maxlength' => true,'readonly'=>true]) ?>  -->   
								<?= $form->field($modelDocumovidet, "[{$i}]fecIns")->widget(DateControl::classname(), [
						    		'type'=>DateControl::FORMAT_DATETIME,
						    			'readonly'=>true,
						    				'autoWidget' => false,
						
									]); ?>                                
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDocumovidet, "[{$i}]userIns")->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div><!-- .panel -->
    <?php DynamicFormWidget::end(); ?>
	
	
	
	
	
	
	
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
