<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeriodoslectivosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Períodos Lectivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodoslectivos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Períodos Lectivos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       	[
        		'attribute'=>'idModalidad',
        				'value'=>'idModalidad0.descModalidad',
    		],
            'idPeriodoLectivo',
            'fecIniPeriodoNatu',
            'fecFinPeriodoNatu',
            'fechaInicioPeriodo',
            // 'fechaFinPeriodo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
