<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planesestudio */

$this->title = 'Create Planesestudio';
$this->params['breadcrumbs'][] = ['label' => 'Planesestudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planesestudio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
