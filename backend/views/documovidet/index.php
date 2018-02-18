<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumovidetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documovidets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documovidet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
      <!--  <?= Html::a('Create Documovidet', ['create'], ['class' => 'btn btn-success']) ?>  --> 
        <?= Html::button('Crear Documovidet', ['value'=>Url::to('index.php?r=documovidet/create'), 'class' => 'btn btn-success','id'=>'modalButton2']) ?>
    </p>
    
    
            
    <?php 
    	Modal::begin([
    		'header' => '<h4 class="modal-title">Documento</h4>',
    		'id'=>'modal2',
    		'size'=>'modal-lg',
			]);
    	
		echo "<div id='modalContent2'></div>'";
		
		Modal::end();
	?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'monto',
            'fecIns',
            'userIns',
          //  'idDocMaestro',
        	[
        			'attribute'=>'numDocMaestro',
        			'value'=>'idDocMaestro0.numero'        			
    		],
        	[
        			'attribute'=>'numDocAplica',
        			'value'=>'idDocAplica0.numero'
    		],
            // 'idDocAplica',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
