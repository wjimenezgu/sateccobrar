<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MovimientosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-index">

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
    				'{toggleData}',
    		],
        'columns' => [           
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
        	
            [
            		'class' => 'kartik\grid\ActionColumn',
            	//	'template' => '{update} {delete}',
            		'template' => '{update}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
            		
        	],
        ],
    ]); ?>


</div>
