<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gradosacademicos */

$this->title = 'Actualizar Grados Académicos: ' . ' ' . $model->idGrado;
$this->params['breadcrumbs'][] = ['label' => 'Grados Académicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idGrado, 'url' => ['view', 'id' => $model->idGrado]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="gradosacademicos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
