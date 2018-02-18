<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Entidad */

$this->title = 'Actualizar Entidad: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Entidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="entidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,    
    	'modelsTelefonos' => $modelsTelefonos,
    	'modelsContactos' => $modelsContactos,
    ]) ?>

</div>
