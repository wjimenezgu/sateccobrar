<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanesestudioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planesestudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planesestudio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Planesestudio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          	[
        		'attribute'=>'idInstitucion',
        				'value'=>'idInstitucion0.nombreInstitucion',
    		],
        	[
        		'attribute'=>'idEscuela',
        		'value'=>'idEscuela0.nombreEscuela',
    		],  
            'idCarrera',
        	[
        		'attribute'=>'idCarrera',
        				'value'=>'idCarrera0.nombreCarrera',
    		],     		
            'idPlanEstudio',
            'nombrePlanEstudio',
            // 'idInstitucionPlan',
            // 'idModalidad',
            // 'observaciones',
            // 'fechaAprobacion',
            // 'numSesionAprobacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
