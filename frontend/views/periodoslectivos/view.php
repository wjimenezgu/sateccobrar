<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Periodoslectivos */

$this->title = $model->idModalidad;
$this->params['breadcrumbs'][] = ['label' => 'Períodos Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodoslectivos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'idModalidad' => $model->idModalidad, 'idPeriodoLectivo' => $model->idPeriodoLectivo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'idModalidad' => $model->idModalidad, 'idPeriodoLectivo' => $model->idPeriodoLectivo], [
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
            'idModalidad',
            'idPeriodoLectivo',
            'fecIniPeriodoNatu',
            'fecFinPeriodoNatu',
            'fechaInicioPeriodo',
            'fechaFinPeriodo',
        ],
    ]) ?>

</div>
