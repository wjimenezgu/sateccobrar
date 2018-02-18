<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Planescursosreqcor */

$this->title = 'Create Planescursosreqcor';
$this->params['breadcrumbs'][] = ['label' => 'Planescursosreqcors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planescursosreqcor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
