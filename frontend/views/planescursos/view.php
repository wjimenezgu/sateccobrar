<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planescursos */

$this->title = $model->idPlanEstudio;
$this->params['breadcrumbs'][] = ['label' => 'Planescursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planescursos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso], [
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
            'idInstitucion',
            'idEscuela',
            'idCarrera',
            'idPlanEstudio',
            'idCurso',
            'codigoCursoPlan',
            'nombreCursoPlan',
            'nivel',
            'posOrden',
        ],
    ]) ?>

</div>
