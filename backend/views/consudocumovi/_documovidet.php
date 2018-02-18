<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProvinciaSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Provincias';
//$this->params['breadcrumbs'][] = $this->title;

$gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],
       // 	'idDocMaestro',
		[
				'attribute'=>'idDocAplica0.numero',		
		],
		[
		'attribute'=>'monto',
			'format'=>['decimal', 2],
			'hAlign'=>'right',

						],
        [
        		'attribute'=>'fecIns',
        		// 'format'=>['date','php:d/m/Y H:i:s A'],
        		'format'=>['date','php:d/m/Y H:i:s'],
        		'width'=>'18%',
        		
        	],    
        	'userIns',

        ];
?>
<div class="documovidet-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
   //     'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],

    		

        'columns' => $gridColumns,
    ]); ?>

</div>
