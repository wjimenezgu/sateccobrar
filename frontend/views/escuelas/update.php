<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escuelas */

$this->title = 'Update Escuelas: ' . ' ' . $model->idEscuela;
$this->params['breadcrumbs'][] = ['label' => 'Escuelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEscuela, 'url' => ['view', 'id' => $model->idEscuela]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escuelas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
