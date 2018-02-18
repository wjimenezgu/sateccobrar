<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Estadoclipro */

$this->title = 'Create Estadoclipro';
$this->params['breadcrumbs'][] = ['label' => 'Estadoclipros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadoclipro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
