<?php

use yii\helpers\Html;
use kartik\detail\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Tipoinstitucion;

/* @var $this yii\web\View */
/* @var $model app\models\Instituciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Instituciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$attributes=[
				[
				'attribute'=>'nombreInstitucion',						
				],
				[
				'attribute'=>'idTipoInstitucion',
				'format'=>'raw',
				//'value'=>Html::a('John Steinbeck', '#', ['class'=>'kv-author-link']),
				'value'=>ArrayHelper::getValue(Tipoinstitucion::findOne(['id' => $model->idTipoInstitucion]),'descripcion'),
				'type'=>DetailView::INPUT_SELECT2,
				'widgetOptions'=>[
									'data'=>ArrayHelper::map(Tipoinstitucion::find()->all(),'id','descripcion'),
									'options' => ['placeholder' => 'Seleccione Tipo Institución'],
									'pluginOptions' => ['allowClear'=>true, 'width'=>'100%'],
								],
										
				],				
];

?>
<div class="instituciones-view">

    <?= DetailView::widget([
        'model' => $model,
    		'condensed'=>true,
    		'hover'=>true,
    		'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
    		'panel'=>[
    				'heading'=>'Institución # ' . $this->title,
    				'type'=>DetailView::TYPE_INFO,
    				],
        'attributes' => $attributes,
    	
    	'deleteOptions'=>[
    				'params' => ['custom_param'=>true],
    				'url'=>['delete', 'id' => $model->id],
    				],
    		
    		
    ]) ?>    
    

</div>
