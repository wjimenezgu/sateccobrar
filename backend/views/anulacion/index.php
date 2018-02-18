<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = 'Anulación';
?>
<div class="anulacion-index">

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
    				
    				'{toggleData}',
    		],
        'columns' => [           
        	['attribute'=>'idCliProCia','value'=>'idCliProCia0.nombre'],
      //  	['attribute'=>'idCarrera','value'=>'idCarrera0.nombreCarrera'],
      //      'idCliProCia',
     //       'idTipoDocumento',
        	[
        			'attribute'=>'idTipoDocumento',
        			'value'=>'idTipoDocumento0.siglas'],
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
            		'template' => '{update}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
        	],
        ],
    ]); ?>
    
    
    

</div>
