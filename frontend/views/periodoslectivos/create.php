<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Periodoslectivos */

$this->title = 'Crear Períodos Lectivos';
$this->params['breadcrumbs'][] = ['label' => 'Períodos Lectivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodoslectivos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
