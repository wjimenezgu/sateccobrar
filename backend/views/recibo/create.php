<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Documento */

$this->title = 'Agregar Recibo';
$this->params['breadcrumbs'][] = ['label' => 'Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocuasoci' => $modelsDocuasoci,
    ]) ?>

</div>
