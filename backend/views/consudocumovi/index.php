<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;
use backend\models\DocumovidetSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consulta Documentos';
$this->params['breadcrumbs'][] = $this->title;


$gridColumns =   [
		[
		'class' => 'kartik\grid\ExpandRowColumn',
				'value' => function ($model,$key,$index,$column){
				return Gridview::ROW_COLLAPSED;
				},
				'detail' => function ($model,$key,$index,$column){
				$searchModel = new DocumovidetSearch();
					$searchModel->idDocMaestro = $model->id;
					$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
					return Yii::$app->controller->renderPartial('_documovidet',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
		
    		  		]);
				},
				],
		
		
				['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre'],
		
				[
						'attribute'=>'idTipoDocumento',
				'value'=>'idTipoDocumento0.siglas'],
				'numero',
				[
						'attribute'=>'fecha',
								'format'=>'date',
										'width'=>'10%',
		
										],
												//	'monto',
														[
																'attribute'=>'monto',
																//	'type'=>'MaskMoney::classname()',
		
																'format'=>['decimal', 2],
																'hAlign'=>'right',
														],
														//  	'saldo',
					[
					'attribute'=>'saldo',
							//	'type'=>'MaskMoney::classname()',
		
							'format'=>['decimal', 2],
							'hAlign'=>'right',
					],
					 
	//				[
	//						'class' => 'kartik\grid\ActionColumn',
							//	'template' => '{update} {delete}',
	//						'template' => '{view}',
	//						'headerOptions'=>['class'=>'kartik-sheet-style'],
		
	//								],
											
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
<div class="consudocumovi-index">

  <!--  <h1><?= Html::encode($this->title) ?></h1>   --> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>$this->title
    		],
    		'toolbar' => [
    			//	[
    			//			'content'=>
    			//			Html::a('Agregar', ['create'], ['class' => 'btn btn-success']),
    			//	],
    		//		$fullExportMenu,
    				'{toggleData}',
    		],
        'columns' => [
        		[
        		'class' => 'kartik\grid\ExpandRowColumn',
        				'value' => function ($model,$key,$index,$column){
        				return Gridview::ROW_COLLAPSED;
        				},
        				'detail' => function ($model,$key,$index,$column){
        				$searchModel = new DocumovidetSearch();
        				$searchModel->idDocMaestro = $model->id;
        				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        		
        				return Yii::$app->controller->renderPartial('_documovidet',[
        				'searchModel' => $searchModel,
        				'dataProvider' => $dataProvider,
        		
    		  		]);
        				},
        				],
        		
        		
        	['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre'],

        	[
        			'attribute'=>'idTipoDocumento',
        			'value'=>'idTipoDocumento0.siglas'],
        	'numero',
        	[
        		'attribute'=>'fecha',
        		'format'=>'date',
        		'width'=>'10%',
        		
        	],        		
        //	'monto',
        	[
        		'attribute'=>'monto',
        		//	'type'=>'MaskMoney::classname()',
        		
        		'format'=>['decimal', 2],
        		'hAlign'=>'right',
    		],        		
     //  	'saldo',
        	[
        		'attribute'=>'saldo',
        		//	'type'=>'MaskMoney::classname()',
        		
        		'format'=>['decimal', 2],
        		'hAlign'=>'right',
        	],
        	

        ],
    ]); ?>


</div>
