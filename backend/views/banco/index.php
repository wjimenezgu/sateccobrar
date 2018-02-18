<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BancoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bancos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banco-index">

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
         'descripcion',	
            [
            		'class' => 'kartik\grid\ActionColumn',
            		'template' => '{update} {delete}',
            		'headerOptions'=>['class'=>'kartik-sheet-style'],
            		
        	],
        ],
    ]); ?>

</div>
