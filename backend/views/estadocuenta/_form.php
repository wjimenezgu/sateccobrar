<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Estadocuenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estadocuenta-form">

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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
