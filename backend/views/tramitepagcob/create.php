<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tramitepagcob */

$this->title = 'Create Tramitepagcob';
$this->params['breadcrumbs'][] = ['label' => 'Tramitepagcobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tramitepagcob-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
