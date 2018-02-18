<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Periodoslectivos */

$this->title = 'Actualizar Períodos Lectivos: ' . ' ' . $model->idModalidad;
$this->params['breadcrumbs'][] = ['label' => 'Períodos Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idModalidad, 'url' => ['view', 'idModalidad' => $model->idModalidad, 'idPeriodoLectivo' => $model->idPeriodoLectivo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="periodoslectivos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
