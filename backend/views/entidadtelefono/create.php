<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Entidadtelefono */

$this->title = 'Create Entidadtelefono';
$this->params['breadcrumbs'][] = ['label' => 'Entidadtelefonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidadtelefono-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
