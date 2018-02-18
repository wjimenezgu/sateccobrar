<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocuenta */

$this->title = 'Create Cliprocuenta';
$this->params['breadcrumbs'][] = ['label' => 'Cliprocuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliprocuenta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
