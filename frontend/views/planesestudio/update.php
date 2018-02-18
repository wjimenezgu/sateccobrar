<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Planesestudio */

$this->title = 'Update Planesestudio: ' . ' ' . $model->idPlanEstudio;
$this->params['breadcrumbs'][] = ['label' => 'Planesestudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPlanEstudio, 'url' => ['view', 'id' => $model->idPlanEstudio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="planesestudio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
