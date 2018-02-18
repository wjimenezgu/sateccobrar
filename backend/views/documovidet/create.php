<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Documovidet */

$this->title = 'Create Documovidet';
$this->params['breadcrumbs'][] = ['label' => 'Documovidets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documovidet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
