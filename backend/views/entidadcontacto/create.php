<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Entidadcontacto */

$this->title = 'Create Entidadcontacto';
$this->params['breadcrumbs'][] = ['label' => 'Entidadcontactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidadcontacto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
