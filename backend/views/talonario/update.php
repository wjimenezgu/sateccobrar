<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Talonario */

$this->title = 'Actualizar Talonario: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Talonarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="talonario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
