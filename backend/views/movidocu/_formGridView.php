<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\datecontrol\DateControl;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;
use kartik\grid\GridView;
use wbraganca\dynamicform\DynamicFormWidget;
use backend\models\Tipodocumento;
use backend\models\Moneda;
use backend\models\Estadodocumento;
use backend\models\Cliprocia;
use backend\models\Documovi;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model backend\models\Movidocu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movidocu-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

   <div class="row">   
    	<div class="col-sm-3">     
    		<?= $form->field($model, 'idCliProCia')->textInput(['value'=>$model->idCliProCia0->nombre,'readonly'=>true]) ?>  		    		    		
    	</div>
    	<div class="col-sm-2">       
    		<?= $form->field($model, 'numero')->textInput(['maxlength' => true,'readonly'=>true]) ?>
    	</div>
    	<div class="col-sm-3">        
    		<?= $form->field($model, 'fecha')->widget(DateControl::classname(), [
    		'type'=>DateControl::FORMAT_DATE,
    			'readonly'=>true,
    				'autoWidget' => false,

			]); ?>
		</div>
		<div class="col-sm-2">       
    		<?= $form->field($model, 'monto')->widget(MaskMoney::classname(), [
    				'readonly'=>true,    				
    				'options' => ['class'=>'text-right'],
				]);
    		?>
    	</div>
    	<div class="col-sm-2">       
    		<?= $form->field($model, 'saldo')->widget(MaskMoney::classname(), [
    				'readonly'=>true,
    				'options' => ['class'=>'text-right'],
				]);
    		?>
    	</div>
	</div>  
	
	<!-- MOVIMIENTOS DEL DOCUMENTO -->
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>'Movimientos'
    		],
    		'toolbar' => [

    				'{toggleData}',
    		],
        'columns' => [           


        		[
        		'attribute'=>'monto',

    		],

        	[
        		'attribute'=>'idDocApliNumero',
        		
        				
    		],
 
     //   	['class' => 'kartik\grid\ActionColumn','template' => '{update}'],
        		['class' => 'yii\grid\ActionColumn',
        		'template' => '{update}{info}',
        		'buttons' => [
        				'info' => function ($url, $model) {
        					return 
        			//		Html::a('<span class="glyphicon glyphicon-info-sign"></span>', $url, [['/documovidet/index'],'title' => Yii::t('app', 'Info'),
        					Html::button('Agregar', ['value'=>Url::to('index.php?r=planescursos/create'),'class' => 'btn btn-success','id'=>'modalButton']);
        							
        			//		]);
        				}
        		],

        		]
        		
        		
        		
        		
        ],
    ]); ?>	  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
