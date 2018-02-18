<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoaulaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoaula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Tipo Aulas', ['create'], ['class' => 'btn btn-success']) ?>
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
          //  'idTipoAula', no se utiliza
            'descTipoAula',
          
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
