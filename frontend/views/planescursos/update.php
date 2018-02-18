<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planescursos */

$this->title = 'Update Planescursos: ' . ' ' . $model->idPlanEstudio;
$this->params['breadcrumbs'][] = ['label' => 'Planescursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPlanEstudio, 'url' => ['view', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planescursos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
