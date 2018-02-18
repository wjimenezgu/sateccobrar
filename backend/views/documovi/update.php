<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Documovi */

// $this->title = 'Actualizar Movimientos: ' . ' ' . $model->idDocumento;
$this->title = 'Actualizar Movimientos' ;
$this->params['breadcrumbs'][] = ['label' => 'Documovis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDocumento, 'url' => ['view', 'id' => $model->idDocumento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documovi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelDocuMoviDets'=>$modelDocuMoviDets
    ]) ?>

</div>
