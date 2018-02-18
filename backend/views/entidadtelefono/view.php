<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Entidadtelefono */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entidadtelefonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidadtelefono-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'idEntidad',
            'idTipoTelefono',
            'numero',
            'observacion',
        ],
    ]) ?>

</div>
