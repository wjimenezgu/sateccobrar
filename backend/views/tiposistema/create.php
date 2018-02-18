<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tiposistema */

$this->title = 'Create Tiposistema';
$this->params['breadcrumbs'][] = ['label' => 'Tiposistemas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposistema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
