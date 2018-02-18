<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocia */

$this->title = 'Crear Cliente x Cía';
$this->params['breadcrumbs'][] = ['label' => 'Clientes x Cía', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliprocia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
