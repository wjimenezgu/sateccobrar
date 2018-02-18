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
$this->title = 'Consulta Documento: ' . ' ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Consulta Documento', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero];
?>

<div class="consudocu-form">

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
		<div class="col-sm-2">     	
   	<!-- 	 <?= $form->field($model, 'monto')->textInput(['maxlength' => true]) ?>  -->	
   			 <?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>
		<div class="col-sm-2">     	
   	<!-- 	 <?= $form->field($model, 'saldo')->textInput(['maxlength' => true]) ?>  -->	
   			 <?= $form->field($model, 'saldo')->widget(MaskMoney::classname(), [
   			 		'disabled' => true,
    				'options' => ['class'=>'text-right'],
				]);
   			 ?>
		</div>	

		<div class="col-sm-2">         		    		
    		<?= $form->field($model, 'idEstadoDocumento')->dropDownList(ArrayHelper::map(Estadodocumento::find()->all(),'id','descripcion'),['readonly'=>true]); ?>
   		</div>
 <!-- 	
		<div class="col-sm-3">   
    		<?= $form->field($model, 'idMoneda')->dropDownList(ArrayHelper::map(Moneda::find()->all(),'id','descripcion'),['readonly'=>true]); ?>
		</div>
 -->
 	<div class="col-sm-3">  			
  			<?= $form->field($model, 'observacion')->textInput(['maxlength' => true,'readonly'=>true]) ?>
	</div>
	</div>	

	
	<!-- MOVIMIENTOS X DOCUMENTO -->
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i ></i> Movimientos del Documento</h4></div>
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
                            <div class="col-sm-3">
                                <?= $form->field($modelDocumovidet, "[{$i}]idDocAplica")->dropDownList(
                                	/**  ORIGINAL
                                		ArrayHelper::map(Documento::find()
                                							->where(['idCliProCia' => $model->idCliProCia])
                                							->andWhere(['!=','id',$model->id])
                                							->orderBy('numero')
                                							->all(),
                                							'id','numero'),
                                		['prompt'=>'Seleccione Documento ..']);
									*/
                                		ArrayHelper::map(Documento::find()
                                		->joinWith(['idTipoDocumento0'])
                                		->where(['idCliProCia' => $model->idCliProCia])
                                		->andWhere(['!=','Documento.id',$model->id])
                             //   		->andWhere(['!=','saldo',0.00])
                                		->andWhere(['!=','idDebiCredi',$model->debiCrediDoc])
                                		->orderBy('numero')
                                		->all(),
                                		'id','numero'),
                                		['disabled' => true]);
                                
                                
                                ?>   
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelDocumovidet, "[{$i}]monto")->widget(MaskMoney::classname(), [    				
    									'options' => ['class'=>'text-right','readonly'=>true],
									]);
    							?>
                            </div>
                            <div class="col-sm-3">   
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
