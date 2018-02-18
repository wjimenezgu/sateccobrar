<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Entidad */

$this->title = 'Crear Entidad';
$this->params['breadcrumbs'][] = ['label' => 'Entidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsTelefonos' => $modelsTelefonos,
    	'modelsContactos' => $modelsContactos,
    ]) ?>

</div>
