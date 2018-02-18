<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipodocumento;
use backend\models\Moneda;
use backend\models\Estadodocumento;
use backend\models\Cliprocia;
use backend\models\Documovi;
use backend\models\Documento;


/* @var $this yii\web\View */
/* @var $model backend\models\Movidocu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movidocu-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

   <div class="row">   
    	<div class="col-sm-3">     
	  		    		    		
    		<?= $form->field($model, 'idCliProCia')->textInput() ?>
    	</div>
    	<div class="col-sm-2">       
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-sm-3">        
    		<?= $form->field($model, 'fecha')->widget(DateControl::classname(), [
    		'type'=>DateControl::FORMAT_DATE,
    		//	'readonly'=>true,
    				'autoWidget' => true,

			]); ?>
		</div>
		<div class="col-sm-2">       
    		<?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
    		//		'readonly'=>true,    				
    				'options' => ['class'=>'text-right'],
				]);
    		?>
    	</div>
    	<div class="col-sm-2">       
    		<?= $form->field($model, 'saldo')->widget(MaskMoney::classname(), [
    		//		'readonly'=>true,
    				'options' => ['class'=>'text-right'],
				]);
    		?>
    	</div>
	</div>  
	
	<div class="row">
        <!-- CURSOS PLAN -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Movimientos del Documento</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelDocuMoviDets[0],
                'formId' => 'dynamic-form',
                'formFields' => [
	          
		                    'monto',
                		'idDocMaestro',
		                	'fecIns',
		                		'userIns'	                
                ],
            ]); ?>

<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Curso</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items">
        
            <?php foreach ($modelDocuMoviDets as $i => $modelDocuMoviDet): ?>

                
                <tr class="item">
                <td class="vcenter">
                    
						
						<?php
                        // necessary for update action.
                        if (! $modelDocuMoviDet->isNewRecord) {
                            echo Html::activeHiddenInput($modelDocuMoviDet, "[{$i}]id");
                        }
                    ?>

				                        	<div class="col-sm-2">
				                               <?= $form->field($modelDocuMoviDet, "[{$i}]monto")->textInput(['maxlength' => true]) ?>     
			                                
				                       	 	</div>

				                       	 	<div class="col-sm-3">
				                              <?= $form->field($modelDocuMoviDet, "[{$i}]fecIns")->textInput(['maxlength' => true]) ?>      				                                    

				                        	</div>
				                        	<div class="col-sm-3">
				                              <?= $form->field($modelDocuMoviDet, "[{$i}]userIns")->textInput(['maxlength' => true]) ?>      				                                    

				                        	</div>
                
                </td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-item btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
                
                
                
            <?php endforeach; ?>
        </tbody>
    </table>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>   
    
	  
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
