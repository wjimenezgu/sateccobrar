<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Usuariocia */

$this->title = 'Update Usuariocia: ' . ' ' . $model->idCompania;
$this->params['breadcrumbs'][] = ['label' => 'Usuariocias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCompania, 'url' => ['view', 'idCompania' => $model->idCompania, 'iduser' => $model->iduser]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuariocia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
