<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuariosinstitucion */

$this->title = $model->idInstitucion;
$this->params['breadcrumbs'][] = ['label' => 'Usuariosinstitucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariosinstitucion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idInstitucion' => $model->idInstitucion, 'idUsuario' => $model->idUsuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idInstitucion' => $model->idInstitucion, 'idUsuario' => $model->idUsuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idInstitucion',
            'idUsuario',
        ],
    ]) ?>

</div>
