<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Movimientos */


?>
<div class="consudocu-view">

	

    <?= $this->render('_form', [
        'model' => $model,
    	'modelsDocumovidet' => $modelsDocumovidet,
    	'modelsDocumoviseach' => $modelsDocumovidet,
    ]) ?>

</div>
