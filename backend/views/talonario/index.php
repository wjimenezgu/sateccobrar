<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TalonarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Talonarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talonario-index">
    
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
        		['attribute'=>'idCompania','value'=>'idCompania0.nombre'],
        		['attribute'=>'mensajero','value'=>'idMensajero0.nombreCompleto'],
            'descripcion',
            'numeroInicial',
            'numeroFinal',
            [
            		'class' => 'kartik\grid\ActionColumn',
            		'template' => '{update} {delete}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
            		
        	],
        ],
    ]); ?>

</div>
