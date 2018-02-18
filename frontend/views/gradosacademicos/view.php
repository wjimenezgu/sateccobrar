<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Gradosacademicos */

$this->title = $model->idGrado;
$this->params['breadcrumbs'][] = ['label' => 'Grados Académicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradosacademicos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idGrado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->idGrado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idInstitucion',
            'idGrado',
            'nombreGrado',
            'siglasGrado',
        ],
    ]) ?>

</div>
