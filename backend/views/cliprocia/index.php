<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CliprociaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes x Cía';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliprocia-index">

    
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
    				[
    						'content'=>
    						Html::a('Agregar', ['create'], ['class' => 'btn btn-success']),
    				],
    				'{toggleData}',
    		],
        'columns' => [           
        	//['attribute'=>'idCliPro','value'=>'idCliPro0.cliProNombre'],

        	['attribute'=>'idCompania','value'=>'idCompania0.nombre'],
            'nombre',	
            [
            		'class' => 'kartik\grid\ActionColumn',
            		'template' => '{update} {delete}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
            		
        	],
        ],
    ]); ?>

</div>
