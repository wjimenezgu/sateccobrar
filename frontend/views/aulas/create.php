<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Aulas */

$this->title = 'Crear Aulas';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
