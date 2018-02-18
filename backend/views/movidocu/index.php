<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MovidocuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movidocu-index">
	<p>
        <?= Html::a('Movimiento Documentos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>'Movimientos Documento'
    		],
    		'toolbar' => [

    				'{toggleData}',
    		],
        'columns' => [           

       //     'id',
      //  		'idCliProCia',
        		[
        		'attribute'=>'idCliProCia',
        				'value'=>'idCliProCia0.nombre',
        				'width'=>'30%',
    		],

        		
       //   'idTipoDocumento',
        	[
        		'attribute'=>'idTipoDocumento',
        				'value'=>'idTipoDocumento0.siglas',
    		],
            'numero',

        		[
        		'attribute'=>'fecha',
        			        		
        				'format'=>'date',
        				'width'=>'10%',
        				
    			],
     //       'monto',
        		[
        		'attribute'=>'monto',
        			//	'type'=>'MaskMoney::classname()',
        				
        				'format'=>['decimal', 2],
        				'hAlign'=>'right',
    			],
            // 'idEstadoDocumento',
            // 'observacion',
            // 'fecIns',
            // 'userIns',
        		[
        		'attribute'=>'saldo',
        		//	'type'=>'MaskMoney::classname()',
        		
        			'format'=>['decimal', 2],
        			'hAlign'=>'right',
        		],
            
            // 'idMoneda',
      //      ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete}'],
        	['class' => 'kartik\grid\ActionColumn','template' => '{update}'],

        		
        		
        		
        ],
    ]); ?>
    


</div>
