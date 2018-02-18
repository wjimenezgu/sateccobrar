<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Clipro */

$this->title = 'Actualizar Cliente: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="clipro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsTramPagCob' => $modelsTramPagCob,
    	'modelsCuenta' => $modelsCuenta,
    ]) ?>

</div>
