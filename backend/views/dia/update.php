<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dia */

$this->title = 'Update Dia: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
