<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Maestro */

$this->title = $model->idMaestro;
$this->params['breadcrumbs'][] = ['label' => 'Maestros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maestro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idMaestro], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idMaestro], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idMaestro',
            'descripcion',
            'idCliente',
        ],
    ]) ?>

</div>
