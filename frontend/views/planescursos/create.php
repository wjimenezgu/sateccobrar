<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planescursos */

$this->title = 'Create Planescursos';
$this->params['breadcrumbs'][] = ['label' => 'Planescursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planescursos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
