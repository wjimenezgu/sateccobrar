<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Usuariocia */

$this->title = 'Create Usuariocia';
$this->params['breadcrumbs'][] = ['label' => 'Usuariocias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariocia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
