<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Maestro */

$this->title = 'Create Maestro';
$this->params['breadcrumbs'][] = ['label' => 'Maestros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maestro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
