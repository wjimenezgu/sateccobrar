<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Debicredi */

$this->title = 'Create Debicredi';
$this->params['breadcrumbs'][] = ['label' => 'Debicredis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="debicredi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
