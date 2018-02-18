<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Movidocu */

$this->title = 'Create Movidocu';
$this->params['breadcrumbs'][] = ['label' => 'Movidocus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movidocu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    	'modelDocuMoviDets'=>$modelDocuMoviDets,    		
    ]) ?>

</div>
