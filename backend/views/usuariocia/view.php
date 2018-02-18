<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Usuariocia */

$this->title = $model->idCompania;
$this->params['breadcrumbs'][] = ['label' => 'Usuariocias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCompania' => $model->idCompania, 'iduser' => $model->iduser], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCompania' => $model->idCompania, 'iduser' => $model->iduser], [
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
            'nivelAcceso',
            'idCompania',
            'iduser',
        ],
    ]) ?>

</div>
