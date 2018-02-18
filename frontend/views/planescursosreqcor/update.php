<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planescursosreqcor */

$this->title = 'Update Planescursosreqcor: ' . ' ' . $model->idPlanEstudio;
$this->params['breadcrumbs'][] = ['label' => 'Planescursosreqcors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPlanEstudio, 'url' => ['view', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planescursosreqcor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
