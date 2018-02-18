<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tipoinstitucion */

$this->title = 'Crear Tipo Instituciones';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Institución', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipoinstitucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
