<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Moneda */

$this->title = 'Actualizar Moneda: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Monedas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="moneda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
