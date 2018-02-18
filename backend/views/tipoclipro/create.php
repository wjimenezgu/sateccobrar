<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipoclipro */

$this->title = 'Create Tipoclipro';
$this->params['breadcrumbs'][] = ['label' => 'Tipoclipros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoclipro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
