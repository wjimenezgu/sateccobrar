<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AulasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Aulas', ['create'], ['class' => 'btn btn-success']) ?>
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
        		'attribute'=>'idSede',
        		'value'=>'idSede0.nombreSede',
    		],
            'descripcion',
            'capacidad',
            // 'idTipoAula',
             'localizacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
