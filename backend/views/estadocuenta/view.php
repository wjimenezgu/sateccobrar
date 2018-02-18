<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Estadocuenta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estadocuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estadocuenta-view">

    
    <?php $form = ActiveForm::begin(); ?>
    
	    <div class="row">
			<div class="col-sm-3">    
		    	<?= $form->field($model, 'idCliPro')->textInput() ?>
			</div>
			<div class="col-sm-3">
		    	<?= $form->field($model, 'idCompania')->textInput() ?>
			</div>
		    <div class="col-sm-3">
		    	<?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-sm-3">
		    	<?= $form->field($model, 'plazoPagCob')->textInput() ?>
		    </div>
	    </div>
		<div class="row">
			<div class="col-sm-3">
			    <?= $form->field($model, 'limitePagCob')->textInput(['maxlength' => true]) ?>
			</div>
			<div class="col-sm-3">
			    <?= $form->field($model, 'idTipoCliPro')->textInput() ?>
			</div>		    
			<div class="col-sm-3">
			    <?= $form->field($model, 'idEstadoCliPro')->textInput() ?>
			</div>		    
			<div class="col-sm-3">
			    <?= $form->field($model, 'obsEstadoCliPro')->textInput(['maxlength' => true]) ?>
			</div>		    
			
			<!--   <?= $form->field($model, 'fecModEstadoCliPro')->textInput() ?>  -->  
					    
		</div>

    <?php ActiveForm::end(); ?>
    

</div>
