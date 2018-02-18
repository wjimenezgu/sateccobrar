<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Estadotalonario */

$this->title = 'Actualizar Estado Talonario: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estado Talonarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estadotalonario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
