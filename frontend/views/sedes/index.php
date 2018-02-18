<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

 $this->title = 'Sedes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-index">

   <!--  <h1><= Html::encode($this->title) ?></h1>  -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    	'containerOptions'=>['style'=>'overflow: auto'],
        'columns' => [
        	'nombreSede',

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
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>'Sedes'
    		],
    ]); ?>

</div>
