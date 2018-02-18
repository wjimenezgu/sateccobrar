<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Entidadtelefono */

$this->title = 'Update Entidadtelefono: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entidadtelefonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entidadtelefono-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
