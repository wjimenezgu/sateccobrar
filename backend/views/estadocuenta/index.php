<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use backend\models\DocuestadoSearch;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EstadocuentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Cuenta';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="estadocuenta-index">

   <!--  <h1><?= Html::encode($this->title) ?></h1>  -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
    	Modal::begin([
    		'header' => '<h4 class="modal-title">Datos Cliente</h4>',
    		'id'=>'modal2',
    		'size'=>'modal-lg',
			]);
    	
		echo "<div id='modalContent2'></div>'";
		
		Modal::end();
	?>
    
    
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
        		[
        		'class' => 'kartik\grid\ExpandRowColumn',
        				'value' => function ($model,$key,$index,$column){
        				return Gridview::ROW_COLLAPSED;
        				},
        				'detail' => function ($model,$key,$index,$column){
        				$searchModel = new DocuestadoSearch();
        				$searchModel->idCliProCia = $model->id;
        				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        		        $dataProvider->pagination  = false;
        				return Yii::$app->controller->renderPartial('_documovidet',[
        				'searchModel' => $searchModel,
        				'dataProvider' => $dataProvider,
        		
    		  		]);
        				},
        				],
        	['attribute'=>'idCliPro','value'=>'idCliPro0.idEntidad',],
        	'nombre',        	
        	['attribute'=>'idTipoCliPro','value'=>'idTipoCliPro0.descripcion',],
        	['attribute'=>'idEstadoCliPro','value'=>'idEstadoCliPro0.descripcion',],
        	'obsEstadoCliPro',
       /*
        	[
        	'class' => 'kartik\grid\ActionColumn',
        			//	'template' => '{update} {delete}',
        			'template' => '{view}',
        			// 'headerOptions'=>['class'=>'kartik-sheet-style'],
        	
        					],
        		*/

        ],
    ]); ?>
    

</div>
