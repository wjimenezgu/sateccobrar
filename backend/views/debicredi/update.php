<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Debicredi */

$this->title = 'Update Debicredi: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Debicredis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="debicredi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
