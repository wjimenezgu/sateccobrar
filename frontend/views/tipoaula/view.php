<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoaula */

$this->title = $model->idTipoAula;
$this->params['breadcrumbs'][] = ['label' => 'Tipoaulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoaula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idTipoAula], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idTipoAula], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTipoAula',
            'descTipoAula',
            'idInstitucion',
        ],
    ]) ?>

</div>
