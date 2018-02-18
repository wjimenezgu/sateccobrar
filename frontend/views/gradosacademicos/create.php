<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gradosacademicos */

$this->title = 'Crear Grados Académicos';
$this->params['breadcrumbs'][] = ['label' => 'Grados Académicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradosacademicos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
