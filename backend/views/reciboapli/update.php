<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */

$this->title = 'Aplicar Recibo: ' . ' ' . $model->numero;
$this->params['breadcrumbs'][] = ['label' => 'Aplicar Recibos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->numero];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="reciboapli-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocumovidet' => $modelsDocumovidet
   // 	'searchFactu' => $searchFactu,
   // 	'dataFactu' => $dataFactu
    ]) ?>

</div>
