<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cliprotrampagcob */

$this->title = 'Create Cliprotrampagcob';
$this->params['breadcrumbs'][] = ['label' => 'Cliprotrampagcobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliprotrampagcob-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
