<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estadocuenta */

$this->title = 'Create Estadocuenta';
$this->params['breadcrumbs'][] = ['label' => 'Estadocuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadocuenta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
