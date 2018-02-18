<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EntidadcontactoSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entidadcontactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidadcontacto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Entidadcontacto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'idEntidad',
            'idPuesto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
