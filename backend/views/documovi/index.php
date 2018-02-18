<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocumoviSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimiento Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documovi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
    		'containerOptions'=>['style'=>'overflow: auto'],    		
    		'responsive'=>true,
    		'hover'=>true,
    		'panel'=>[
    				'type'=>GridView::TYPE_PRIMARY,
    				'heading'=>'Movimiento Documentos'
    		],
    		'toolbar' => [
    				
    				'{toggleData}',
    		],
        'columns' => [               
            'idDocumento',
            ['class' => 'yii\grid\ActionColumn','template' => '{update}'],
        ],
    ]); ?>

</div>
