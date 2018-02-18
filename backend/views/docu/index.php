<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\grid\EditableColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docus';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns =[
            ['class' => 'yii\grid\SerialColumn'],

       //     'id',
       //     'idTipoDocumento',
            'numero',
            'fecha',
            'monto',
            // 'idEstadoDocumento',
            // 'observacion',
            // 'fecIns',
            // 'userIns',
             'saldo',
        	[
        			'class'=>'kartik\grid\EditableColumn',
        			'attribute'=>'montoAplica',
        			'value'=>'montoAplica',
        			'editableOptions'=>[
        				 'header'=>'Monto Aplicar',
       					 'inputType'=>\kartik\editable\Editable::INPUT_MONEY,
        				 'options'=>['pluginOptions'=>['min'=>0, 'max'=>5000]]
    					],
    				'hAlign'=>'right',
    				'vAlign'=>'middle',
    				'width'=>'100px',
    				'format'=>['decimal', 2],
    				'pageSummary'=>true,        			        			
        	],
            // 'idCliProCia',
            // 'idMoneda',
            // 'fecVence',
            // 'fecMod',
            // 'userMod',

            ['class' => 'yii\grid\ActionColumn'],
        ];
?>
<div class="docu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
     <!--    <?= Html::a('Create Docu', ['create'], ['class' => 'btn btn-success']) ?>  -->
        <?= Html::button('Crear Docu', ['value'=>Url::to('index.php?r=docu/create'), 'class' => 'btn btn-success','id'=>'modalButton2']) ?>
    </p>
    
    
        
    <?php 
    	Modal::begin([
    		'header' => '<h4 class="modal-title">Documento</h4>',
    		'id'=>'modal2',
    		'size'=>'modal-lg',
		]);
    	
		echo "<div id='modalContent2></div>'";
		
		Modal::end();
	?>
    


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>

</div>
