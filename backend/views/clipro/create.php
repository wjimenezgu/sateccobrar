<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Clipro */

$this->title = 'Crear Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clipro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsTramPagCob' => $modelsTramPagCob,
    	'modelsCuenta' => $modelsCuenta,
    		
    ]) ?>

</div>
