<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Tipoentidad;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipotelefono;
use backend\models\Puesto;

/* @var $this yii\web\View */
/* @var $model backend\models\Entidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entidad-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
		<div class="col-sm-9">     
    		<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
    	</div>
   		<div class="col-sm-3"> 
    		<?= $form->field($model, 'idTipoEntidad')->dropDownList(ArrayHelper::map(Tipoentidad::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Tipo Entidad ...']); ?>
    	</div>
	</div>
	<div class="row">
		<div class="col-sm-3">  
			<?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-sm-2">  
			<?= $form->field($model, 'apartado')->textInput(['maxlength' => true]) ?>
		</div>
		<div class="col-sm-7">  
			<?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12"> 
			<?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
		</div>
	</div>
	
	
    <!-- TELEFONOS X ENTIDAD -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Teléfonos</h4></div>
        <div class="panel-body">	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 5, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsTelefonos[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idTipoTelefono',
        	'numero',
        	'observacion',

        ],
    ]); ?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Teléfono</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-items"> <!-- widgetBody -->           
            
            <?php foreach ($modelsTelefonos as $i => $modelTelefonos): ?>
            
            <tr class="item">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelTelefonos->isNewRecord) {
                                echo Html::activeHiddenInput($modelTelefonos, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-3">
                            
                                <?= $form->field($modelTelefonos, "[{$i}]idTipoTelefono")->dropDownList(      
                                		ArrayHelper::map(Tipotelefono::find()
                                		->all(),
                                		'id','descripcion'),
                                		['prompt'=>'Seleccione Tipo Teléfono ..']);

                                ?>   
                            </div>
                            <div class="col-sm-4">
                                <?= $form->field($modelTelefonos, "[{$i}]numero")->textInput(['maxlength' => true]) ?>    				    					
                            </div>
                            <div class="col-sm-5">
                                <?= $form->field($modelTelefonos, "[{$i}]observacion")->textInput(['maxlength' => true]) ?>    				    					
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
	
	

    
    
    <!-- CONTACTOS X ENTIDAD -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Contactos</h4></div>
        <div class="panel-body">	
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapperC', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-itemsC', // required: css class selector
        'widgetItem' => '.itemC', // required: css class
        'limit' => 5, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-itemC', // css class
        'deleteButton' => '.remove-itemC', // css class
        'model' => $modelsContactos[0],
        'formId' => 'dynamic-form',
        'formFields' => [
        	'idTipoTelefono',
        	'numero',
        	'observacion',

        ],
    ]); ?>

            
	<table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Contacto</th>
                <th class="text-center" style="width: 90px;">
                    <button type="button" class="add-itemC btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar</button>
                </th>
            </tr>
        </thead>
        <tbody class="container-itemsC"> <!-- widgetBody -->           
            
            <?php foreach ($modelsContactos as $i => $modelContactos): ?>
            
            <tr class="itemC">
                <td class="vcenter">
						<div class="row">

                        <?php
                            // necessary for update action.
                            if (! $modelContactos->isNewRecord) {
                                echo Html::activeHiddenInput($modelContactos, "[{$i}]id");
                            }
                        ?>
                            <div class="col-sm-3">
                            
                                <?= $form->field($modelContactos, "[{$i}]idPuesto")->dropDownList(      
                                		ArrayHelper::map(Puesto::find()
                                		->all(),
                                		'id','descripcion'),
                                		['prompt'=>'Seleccione Tipo Puesto ..']);

                                ?>   
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelContactos, "[{$i}]nombre")->textInput(['maxlength' => true]) ?>    				    					
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelContactos, "[{$i}]correoE")->textInput(['maxlength' => true]) ?>    				    					
                            </div>
                         </div><!-- .row -->
				</td>
                <td class="text-center vcenter" style="width: 90px; verti">
                    <button type="button" class="remove-itemC btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus"></span></button>
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
