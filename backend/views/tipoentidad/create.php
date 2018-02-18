<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tipoentidad */

$this->title = 'Crear Tipo Entidad';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Entidad', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoentidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
