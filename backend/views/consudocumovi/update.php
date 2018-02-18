<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */

$this->title = 'Actualizar Movimientos: ' . ' ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="movimientos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocumovidet' => $modelsDocumovidet,
    ]) ?>

</div>
