<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estadodocumento */

$this->title = 'Actualizar Estado Documento: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estado Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadodocumento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
