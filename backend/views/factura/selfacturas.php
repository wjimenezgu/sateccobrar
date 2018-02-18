<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns =   [
		['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre',
			'pageSummary'=>'Totales',
        			'pageSummaryOptions'=>['class'=>'text-right text-warning'],		
		],
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
<div class="factura-selfacturas">

  <!--  <h1><?= Html::encode($this->title) ?></h1>   --> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'showPageSummary'=>true,
    		'containerOptions'=>['style'=>'overflow: auto','id'=>'sfactu'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>$this->title,
    				'afterOptions'=>['class'=>'pull-right'],
    				'after'=>Html::button('<i class="glyphicon glyphicon-download-alt"></i> Bajar Seleccionadas', ['value'=>Url::to('index.php?r=factura/selfacturas'), 'class' => 'btn btn-info','id'=>'modalButton',
    										'onclick'=>"var keys = $('#sfactu').yiiGridView('getSelectedRows').length; alert(keys &gt; 0 ? 'Bajaron ' + keys + ' seleccionadas para aplicar' : 'No filas seleccionadas');"]),
    			],
    		'toolbar' => [    				
    				'{toggleData}',
    		],
        'columns' => $gridColumns,
    		'pjax'=>true,
    ]); ?>

    
    
    

</div>
