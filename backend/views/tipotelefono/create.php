<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipotelefono */

$this->title = 'Crear Tipo Teléfono';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Teléfonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipotelefono-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
