<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsuariociaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuariocias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuariocia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nivelAcceso',
            'idCompania',
            'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
