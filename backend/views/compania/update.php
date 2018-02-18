<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Compania */

$this->title = 'Actualizar Compañía: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Compañías', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="compania-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
