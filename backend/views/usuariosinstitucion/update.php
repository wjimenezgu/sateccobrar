<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuariosinstitucion */

$this->title = 'Update Usuariosinstitucion: ' . ' ' . $model->idInstitucion;
$this->params['breadcrumbs'][] = ['label' => 'Usuariosinstitucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idInstitucion, 'url' => ['view', 'idInstitucion' => $model->idInstitucion, 'idUsuario' => $model->idUsuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuariosinstitucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
