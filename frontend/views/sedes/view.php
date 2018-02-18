<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Sedes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$attributes=[
		[
				'attribute'=>'nombreSede',
		]
];

?>
<div class="sedes-view">


    <?= DetailView::widget([
        'model' => $model,
    		'condensed'=>true,
    		'hover'=>true,
    		'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
    		'panel'=>[
    				'heading'=>'Sede # ' . $this->title,
    				'type'=>DetailView::TYPE_INFO,
    				],
        'attributes' => $attributes,
    	
    	'deleteOptions'=>[
    				'params' => ['custom_param'=>true],
    				'url'=>['delete', 'id' => $model->id],
    				],
    		
    		
    ])?>

</div>
