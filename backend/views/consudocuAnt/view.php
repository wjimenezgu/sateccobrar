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

/* @var $this yii\web\View */
/* @var $model backend\models\Documento */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Consultar Documento: ' . ' ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Consultar Documento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero, 'url' => ['view', 'id' => $model->id]];

?>

<div class="consudocu-view">

	<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
 	<div class="row">
 		<div class="col-sm-6">     
    	<!-- <?= $form->field($model, 'idCliProCia')->dropDownList(ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),['prompt'=>'Seleccione Cliente']); ?>   -->	
    		<?= $form->field($model, 'idCliProCia')->widget(Select2::classname(), 
    				[
    					'language' => 'es',
    					'disabled' => true,
    					'data' => ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),
    					'options' => ['placeholder' => 'Seleccione Cliente ..'],
    					'pluginOptions' => ['allowClear' => true],
					]);
    		?>
    	</div>	
 		<div class="col-sm-3">     
    		<?= $form->field($model, 'idTipoDocumento')->dropDownList(ArrayHelper::map(Tipodocumento::find()->all(),'id','descripcion'),['readonly'=>true]); ?>
    	</div>
		<div class="col-sm-3">     
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    	</div>
 	</div>	
	<div class="row">
		<div class="col-sm-3">         		
    			<?= $form->field($model, 'fecha')->widget(DateControl::classname(), [
    			'type'=>DateControl::FORMAT_DATE,
    			'disabled' => true,
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
   			 		'disabled' => true,
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
		<div class="col-sm-3">         		    		
    		<?= $form->field($model, 'idEstadoDocumento')->dropDownList(ArrayHelper::map(Estadodocumento::find()->all(),'id','descripcion'),['readonly'=>true]); ?>
   		</div>
		<div class="col-sm-3">   
    		<?= $form->field($model, 'idMoneda')->dropDownList(ArrayHelper::map(Moneda::find()->all(),'id','descripcion'),['readonly'=>true]); ?>
		</div>
	</div>	
	<div class="row">  			
  			<?= $form->field($model, 'observacion')->textInput(['maxlength' => true,'readonly'=>true]) ?>
	</div>
	
	

       <!-- DOCUMENTOS ASOCIADOS CUANDO ES RECIBO -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Documentos Asociados</h4></div>
        <div class="panel-body">	
    		<?php DynamicFormWidget::begin([
        		'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        		'widgetBody' => '.container-items', // required: css class selector
        		'widgetItem' => '.item', // required: css class
        		'limit' => 5, // the maximum times, an element can be added (default 999)
        		'min' => 0, // 0 or 1 (default 1)
        		'insertButton' => '.add-item', // css class
        		'deleteButton' => '.remove-item', // css class
        		'model' => $modelsDocuasoci[0],
        		'formId' => 'dynamic-form',
        		'formFields' => [
			        	'idDocAplica',
			        	'monto',
			        	'fecIns',
			        	'userIns',	
			
			        ],
			    ]);
    		?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Documento</th>
            </tr>
        </thead>
        <tbody class="container-items"> <!-- widgetBody -->           
            
            <?php foreach ($modelsDocuasoci as $i => $modelDocuasoci): ?>
            
            <tr class="item">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelDocuasoci->isNewRecord) {
                                echo Html::activeHiddenInput($modelDocuasoci, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-3">
                            	<?= $form->field($modelDocuasoci, "[{$i}]idTipoDocumento")->dropDownList(ArrayHelper::map(Tipodocumento::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Tipo ...']); ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDocuasoci, "[{$i}]numero")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDocuasoci, "[{$i}]monto")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right'],
									]);
    							?>
                            </div>
                             <div class="col-sm-3">
                                <?= $form->field($modelDocuasoci, "[{$i}]observacion")->textInput(['maxlength' => true]) ?>
                            </div>                           
                        </div><!-- .row -->
				</td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php DynamicFormWidget::end(); ?>
	        </div>
    </div>   
    

    <?php ActiveForm::end(); ?>

</div>
