<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estadodocumento */

$this->title = 'Crear Estado Documento';
$this->params['breadcrumbs'][] = ['label' => 'Estado Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadodocumento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
