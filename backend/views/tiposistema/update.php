<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tiposistema */

$this->title = 'Update Tiposistema: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tiposistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiposistema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
