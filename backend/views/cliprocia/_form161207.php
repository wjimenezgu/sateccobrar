<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Compania;
use backend\models\Clipro;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Cliprocia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliprocia-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'idCompania')->dropDownList(ArrayHelper::map(Compania::find()->all(),'id','nombre'),['prompt'=>'Seleccione Compañía ..']); ?>   
         
    <!-- <?= $form->field($model, 'idCliPro')->dropDownList(ArrayHelper::map(Clipro::find()->all(),'id','cliProNombre'),['prompt'=>'Seleccione Compañía ..']); ?>    -->
    <?= $form->field($model, 'idCliPro')->widget(Select2::classname(), 
    				[
    					'language' => 'es',
    					'data' => ArrayHelper::map(Clipro::find()->all(),'id','cliProNombre'),
    					'options' => ['placeholder' => 'Seleccione Cliente ..'],
    					'pluginOptions' => ['allowClear' => true],
					]);
    		?>
    <?= $form->field($model, 'plazoPagCob')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
