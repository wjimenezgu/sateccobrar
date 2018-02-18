<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstitucionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// $this->title = 'Instituciones';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="instituciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'containerOptions'=>['style'=>'overflow: auto'],
        'columns' => [            
            'nombreInstitucion',
        	[
        		'attribute'=>'idTipoInstitucion',
        		'value'=>'idTipoInstitucion0.descripcion',
    		],        		
        	['class' => 'yii\grid\ActionColumn',
        			'template' => '{view}'
        	],
        ],
    		'toolbar' => [
    				[
    						'content'=>
    						Html::a('Agregar', ['create'], ['class' => 'btn btn-success']),
    				],
    				'{toggleData}',
    		],
    	'responsive'=>true,
    	'hover'=>true,
    	'panel'=>[
    				'type'=>GridView::TYPE_PR,
    				'heading'=>'Instituciones'
    		],
    ]); ?>    

</div>
