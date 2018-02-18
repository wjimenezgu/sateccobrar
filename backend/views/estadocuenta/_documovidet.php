<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvinciaSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */


$gridColumns =   [
		[
				'attribute'=>'idTipoDocumento',
				'value'=>'idTipoDocumento0.siglas',
				'pageSummary'=>'Totales',
				'pageSummaryOptions'=>['class'=>'text-right text-warning'],
		],
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
			
				
		],
		//  	'saldo',
		[
		'attribute'=>'saldoGrid',
				//	'type'=>'MaskMoney::classname()',
		
		'format'=>['decimal', 2],
				'hAlign'=>'right',
				'pageSummary'=>true,
						],		
		
	
	
];
?>
<div class="documovidet-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
   //     'filterModel' => $searchModel,
    		'showPageSummary'=>true,
    		'containerOptions'=>['style'=>'overflow: auto'],
        'columns' => $gridColumns,
    ]); ?>

</div>
