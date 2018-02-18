<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Documento */

$this->title = 'Actualizar Documento: ' . ' ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocuasoci' => $modelsDocuasoci,
    ]) ?>

</div>
