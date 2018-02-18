<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Documovi */

$this->title = 'Create Documovi';
$this->params['breadcrumbs'][] = ['label' => 'Documovis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documovi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
