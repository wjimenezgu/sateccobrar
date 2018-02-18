<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estadotalonario */

$this->title = 'Crear Estado Talonario';
$this->params['breadcrumbs'][] = ['label' => 'Estado Talonarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadotalonario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
