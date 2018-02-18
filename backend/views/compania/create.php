<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Compania */

$this->title = 'Crear Compañía';
$this->params['breadcrumbs'][] = ['label' => 'Compañías', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compania-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
