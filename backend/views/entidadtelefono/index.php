<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EntidadtelefonoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entidadtelefonos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidadtelefono-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Entidadtelefono', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idEntidad',
            'idTipoTelefono',
            'numero',
            'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
