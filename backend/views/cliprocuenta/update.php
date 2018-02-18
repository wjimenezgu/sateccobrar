<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocuenta */

$this->title = 'Update Cliprocuenta: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cliprocuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cliprocuenta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
