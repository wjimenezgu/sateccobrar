<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Moneda */

$this->title = 'Crear Moneda';
$this->params['breadcrumbs'][] = ['label' => 'Monedas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="moneda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
