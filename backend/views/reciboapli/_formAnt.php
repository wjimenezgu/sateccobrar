<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\grid\GridView;
use kartik\money\MaskMoney;
use kartik\grid\EditableColumn;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipodocumento;
use backend\models\Estadodocumento;
use backend\models\Moneda;
use backend\models\Cliprocia;
use backend\models\Documento;
/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */
/* @var $form yii\widgets\ActiveForm */
$gridColumns =   [
		//['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre',
		//		'pageSummary'=>'Totales',
		//		'pageSummaryOptions'=>['class'=>'text-right text-warning'],
		//],
		//  	['attribute'=>'idCarrera','value'=>'idCarrera0.nombreCarrera'],
		//      'idCliProCia',
		//       'idTipoDocumento',
		//	[
		//			'attribute'=>'idTipoDocumento',
				//			'value'=>'idTipoDocumento0.siglas'],
				'numero',
		[
				'attribute'=>'fecha',
				'format'=>'date',
				'width'=>'10%',

		],
		[
				'attribute'=>'fecVence',
				'format'=>'date',
				'width'=>'10%',

		],
		'antiguedad',
		//	'monto',
		
		[
				'attribute'=>'monto',
				//	'type'=>'MaskMoney::classname()',

				'format'=>['decimal', 2],
				'hAlign'=>'right',
				'pageSummary'=>true,
		],
		
		/*
		[
		'class'=>'kartik\grid\EditableColumn',
				'attribute'=>'monto',
						'value'=>'monto',
						'editableOptions'=>[
								'header'=>'Monto Docu',
								'inputType'=>\kartik\editable\Editable::INPUT_MONEY,
								'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
								],
    				'hAlign'=>'right',
										'vAlign'=>'middle',
										'width'=>'100px',
										'format'=>['decimal', 2],
										'pageSummary'=>true,
		],
		
	*/	
		
		//  	'saldo',
		[
				'attribute'=>'saldo',
				//	'type'=>'MaskMoney::classname()',

				'format'=>['decimal', 2],
				'hAlign'=>'right',
				'pageSummary'=>true,
		],
			
		[
				'class'=>'kartik\grid\CheckboxColumn',
				'headerOptions'=>['class'=>'kartik-sheet-style'],
		],
];

?>

<div class="reciboapli-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

 	<div class="row">
 		<div class="col-sm-6">     
    		<?= $form->field($model, 'idCliProCia')->widget(Select2::classname(), [
			    'language' => 'es',
    			'disabled' => true,
			    'data' => ArrayHelper::map(Cliprocia::find()->all(),'id','nombre'),
			    'options' => ['placeholder' => 'Seleccione Cliente ..'],    			
			    'pluginOptions' => [
			        'allowClear' => true,
			    				    	
    						],
				]);
    		?> 		
    	</div>	
 		<div class="col-sm-2">     
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    	</div>
		<div class="col-sm-2">     	
   			 <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
		<div class="col-sm-2">     	
   			 <?= $form->field($model, 'saldo')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => [
    						'class'=>'text-right'
    				],
   			 		'pluginOptions' => [
   			 		//		'prefix' => '$ ',
   			 		//		'suffix' => ' €',
   			 				'allowNegative' => true
   			 		]
				]);
   			 ?>
		</div>
	</div>	

    <?= GridView::widget([
        'dataProvider' => $dataFactu,
     //   'filterModel' => $searchFactu,
    	'showPageSummary'=>true,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'id'=>'selFactu',
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>$this->title,
    				'afterOptions'=>['class'=>'pull-right'],
    				'after'=>Html::button('<i class="glyphicon glyphicon-download-alt"></i> Aplicar Seleccionadas', ['class' => 'btn btn-info',
    						'id'=>'selButton',
    							]),
    			],
    		'toolbar' => [    				
    				'{toggleData}',
    		],
        'columns' => $gridColumns,
    		
    ]); ?>
    
    
    <?php 
    	Modal::begin([
    		'header' => '<h4 class="modal-title">Facturas</h4>',
    		'id'=>'modal',
    		'size'=>'modal-lg',
		]);
    	
		echo "<div id='modalContent'></div>'";
		
		Modal::end();
	?>
    

    <?php ActiveForm::end(); ?>
    
        <!-- MOVIMIENTOS X DOCUMENTO -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Movimientos del Recibo</h4></div>
        <div class="panel-body">	
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

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Movimientos</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items"> <!-- widgetBody -->           
            
            <?php foreach ($modelsDocumovidet as $i => $modelDocumovidet): ?>
            
            <tr class="item">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelDocumovidet->isNewRecord) {
                                echo Html::activeHiddenInput($modelDocumovidet, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-4">
                            	<?= $form->field($modelDocumovidet, "[{$i}]numDocAplica")->textInput(['maxlength' => true,'readonly'=>true]) ?>

                            </div>
                       
                            <div class="col-sm-3">
                                <?= $form->field($modelDocumovidet, "[{$i}]saldo")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right','readonly'=>true],
									]);
    							?>
                            </div>
                       
                            <div class="col-sm-3">
                                <?= $form->field($modelDocumovidet, "[{$i}]monto")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right'],
									]);
    							?>
                            </div>
                      <!-- 
                            <div class="col-sm-3">   
								<?= $form->field($modelDocumovidet, "[{$i}]fecIns")->widget(DateControl::classname(), [
						    		'type'=>DateControl::FORMAT_DATETIME,
						    			'readonly'=>true,
						    				'autoWidget' => false,
						
									]); ?>                                
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelDocumovidet, "[{$i}]userIns")->textInput(['maxlength' => true,'readonly'=>true]) ?>
                            </div>
                       -->
                        </div><!-- .row -->
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
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
 <!--   <?= Html::button('Buscar Facturas', ['value'=>Url::to('index.php?r=reciboapli/selfacturas'), 'class' => 'btn btn-success','id'=>'modalButton']) ?>   --> 
    </div>

</div>
