<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoinstitucion */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Instituciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$attributes=[
		[
				'attribute'=>'descripcion',
		]
];


?>
<div class="tipoinstitucion-view">


    
    
    <?= DetailView::widget([
        'model' => $model,
    		'condensed'=>true,
    		'hover'=>true,
    		'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
    		'panel'=>[
    				'heading'=>'Tipo Institución # ' . $this->title,
    				'type'=>DetailView::TYPE_INFO,
    				],
        'attributes' => $attributes,
    	
    	'deleteOptions'=>[
    				'params' => ['custom_param'=>true],
    				'url'=>['delete', 'id' => $model->id],
    				],
    		
    		
    ]) ?>
    

</div>
