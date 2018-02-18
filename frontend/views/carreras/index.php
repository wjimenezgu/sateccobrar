<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarrerasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carreras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carreras-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Carreras', ['create'], ['class' => 'btn btn-success']) ?>
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
      //      'idCarrera',
        		[
        		'attribute'=>'idGrado',
        				'value'=>'idGrado0.nombreGrado',
    		],        		        		
            'nombreCarrera',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
