<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CliprotrampagcobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cliprotrampagcobs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliprotrampagcob-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliprotrampagcob', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idCliPro',
            'idDia',
            'idTramitePagCob',
            'horaInicia',
            // 'horaFin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
