<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Docu */

$this->title = 'Create Docu';
$this->params['breadcrumbs'][] = ['label' => 'Docus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
