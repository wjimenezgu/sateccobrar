<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanescursosreqcorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Planescursosreqcors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planescursosreqcor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Planescursosreqcor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idInstitucion',
            'idEscuela',
            'idCarrera',
            'idPlanEstudio',
            'idCurso',
            // 'idCursoReqCor',
            // 'idIndReqCor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
