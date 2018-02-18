<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Talonario */

$this->title = 'Crear Talonario';
$this->params['breadcrumbs'][] = ['label' => 'Talonarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="talonario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
