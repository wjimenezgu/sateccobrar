<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipoaula */

$this->title = 'Update Tipoaula: ' . ' ' . $model->idTipoAula;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipoAula, 'url' => ['view', 'id' => $model->idTipoAula]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="tipoaula-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
