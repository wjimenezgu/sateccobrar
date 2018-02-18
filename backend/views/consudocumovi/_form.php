<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
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


$gridColumns = [        
        	[
        			'attribute'=>'idDocAplica0.numero',
        			'pageSummary'=>'Total',
        			'pageSummaryOptions'=>['class'=>'text-right text-warning'],
        			
        	],
        	[
        		'attribute'=>'monto',
        		//	'type'=>'MaskMoney::classname()',
        		
        		'format'=>['decimal', 2],
        		'hAlign'=>'right',
        		'pageSummary'=>true,
        				],
        	[
        		'attribute'=>'fecIns',
        		// 'format'=>['date','php:d/m/Y H:i:s A'],
        		'format'=>['date','php:d/m/Y H:i:s'],
        		'width'=>'18%',
        		
        	],        		
        	'userIns',
       

        ];

$fullExportMenu =ExportMenu::widget([
		'dataProvider' => $dataProvider,		
		'columns' => $gridColumns,
		'fontAwesome' => true,
		'dropdownOptions' => [
				'label' => 'Exportar Todo',
				'class' => 'btn btn-default'
		]
]) ;

?>

<div class="consudocumovi-form">

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

	
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
			'showPageSummary'=>true,
    //    'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>'Movimientos Documento'
    		],
    		'toolbar' => [
    				
    			//	[
    			//			'content'=>
    			//			Html::a('Agregar', ['create'], ['class' => 'btn btn-success']),
    			//	],
    				'{toggleData}',
    		],
        'columns' => $gridColumns,
    ]); ?>
	    </div>   
    

    <?php ActiveForm::end(); ?>

</div>
