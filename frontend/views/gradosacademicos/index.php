<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GradosacademicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grados Académicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradosacademicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Grados Académicos', ['create'], ['class' => 'btn btn-success']) ?>
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
            'nombreGrado',
            'siglasGrado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
