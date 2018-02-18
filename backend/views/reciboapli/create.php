<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */

$this->title = 'Agregar Movimientos';
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimientos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocumovidet' => $modelsDocumovidet,
    ]) ?>

</div>
