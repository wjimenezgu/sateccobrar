<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Entidad;
use backend\models\Tiposistema;
use kartik\widgets\Select2;
use kartik\datecontrol\DateControl;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tramitepagcob;
use backend\models\Dia;
use backend\models\Banco;
use backend\models\Moneda;

/* @var $this yii\web\View */
/* @var $model backend\models\Clipro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clipro-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
     	<div class="row">
 	 		<div class="col-sm-12">     
				<?= $form->field($model, 'idEntidad')->widget(Select2::classname(), 
			    				[
			    					'language' => 'es',
			    					'data' => ArrayHelper::map(Entidad::find()->all(),'id','nombre'),
			    					'options' => ['placeholder' => 'Seleccione Entidad ..'],
			    					'pluginOptions' => ['allowClear' => true],
								]);
			    		?>
			</div>
		</div>
		<div class="row">
 	 		<div class="col-sm-6">     		
    			<?= $form->field($model, 'idTipoSistema')->dropDownList(ArrayHelper::map(Tiposistema::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Sistema ...']); ?>
    		</div>
    		<div class="col-sm-6">
    			<?= $form->field($model, 'plazoPagCob')->textInput() ?> 
			</div>
		</div>
 
    
    <!-- TRAMITES FACTURAS -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Trámites Facturas</h4></div>
        <div class="panel-body">	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 5, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsTramPagCob[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idTramitePagCob',
        	'idDia',
        	'horaInicia',
        	'horaFin',

        ],
    ]); ?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Trámite</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items"> <!-- widgetBody -->           
            
            <?php foreach ($modelsTramPagCob as $i => $modelTramPagCob): ?>
            
            <tr class="item">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelTramPagCob->isNewRecord) {
                                echo Html::activeHiddenInput($modelTramPagCob, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-4">
                            
                                <?= $form->field($modelTramPagCob, "[{$i}]idTramitePagCob")->dropDownList(      
                                		ArrayHelper::map(Tramitepagcob::find()
                                		->all(),
                                		'id','descripcion'),
                                		['prompt'=>'Seleccione Trámite ..']);

                                ?>   
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelTramPagCob, "[{$i}]idDia")->dropDownList(      
                                		ArrayHelper::map(Dia::find()
                                		->all(),
                                		'id','nombreDia'),
                                		['prompt'=>'Seleccione Día ..']);

                                ?>       				    					
                            </div>
                            <div class="col-sm-3">
                         <!--      <?= $form->field($modelTramPagCob, "[{$i}]horaInicia")->textInput(['maxlength' => true]) ?>  -->  
                                <?= $form->field($modelTramPagCob, "[{$i}]horaInicia")->widget(DateControl::classname(), [
						    			'type'=>DateControl::FORMAT_TIME,						    		
						    			'options' => [
						    				'pluginOptions' => [
						    						'autoclose' => true
						    				],
						    			]
										]); ?>    				    					
                            </div>
                            <div class="col-sm-3">
                         <!--       <?= $form->field($modelTramPagCob, "[{$i}]horaFin")->textInput(['maxlength' => true]) ?>  --> 
                                <?= $form->field($modelTramPagCob, "[{$i}]horaFin")->widget(DateControl::classname(), [
						    			'type'=>DateControl::FORMAT_TIME,						    		
						    			'options' => [
						    				'pluginOptions' => [
						    						'autoclose' => true
						    				],
						    			]
										]); ?>    		    				    					
                            </div>
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
     
     <!-- CUENTAS BANCO CUANDO ES PROVEEDOR -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Cuentas Bancos</h4></div>
        <div class="panel-body">	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapperP', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-itemsP', // required: css class selector
        'widgetItem' => '.itemP', // required: css class
        'limit' => 5, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-itemP', // css class
        'deleteButton' => '.remove-itemP', // css class
        'model' => $modelsCuenta[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idTramitePagCob',
        	'idDia',
        	'horaInicia',
        	'horaFin',

        ],
    ]); ?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Cuenta</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-itemP btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-itemsP"> <!-- widgetBody -->           
            
            <?php foreach ($modelsCuenta as $i => $modelCuenta): ?>
            
            <tr class="itemP">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelCuenta->isNewRecord) {
                                echo Html::activeHiddenInput($modelCuenta, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-4">
                            
                                <?= $form->field($modelCuenta, "[{$i}]idBanco")->dropDownList(      
                                		ArrayHelper::map(Banco::find()
                                		->all(),
                                		'id','descripcion'),
                                		['prompt'=>'Seleccione Banco ..']);

                                ?>   
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelCuenta, "[{$i}]idMoneda")->dropDownList(      
                                		ArrayHelper::map(Moneda::find()
                                		->all(),
                                		'id','descripcion'),
                                		['prompt'=>'Seleccione Moneda ..']);

                                ?>       				    					
                            </div>
                            <div class="col-sm-3">
                               <?= $form->field($modelCuenta, "[{$i}]cuenta")->textInput(['maxlength' => true]) ?>  
                                			    					
                            </div>
                            <div class="col-sm-3">
                               <?= $form->field($modelCuenta, "[{$i}]cuentaCliente")->textInput(['maxlength' => true]) ?>   
                                	    				    					
                            </div>
                         </div><!-- .row -->
				</td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-itemP btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php DynamicFormWidget::end(); ?>
	        </div>
    </div>  
 
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    
    
    <?php ActiveForm::end(); ?>

</div>
