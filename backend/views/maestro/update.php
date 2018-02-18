<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Maestro */

$this->title = 'Update Maestro: ' . ' ' . $model->idMaestro;
$this->params['breadcrumbs'][] = ['label' => 'Maestros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idMaestro, 'url' => ['view', 'id' => $model->idMaestro]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maestro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
