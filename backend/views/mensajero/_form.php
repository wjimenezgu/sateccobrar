<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Compania;

/* @var $this yii\web\View */
/* @var $model backend\models\Mensajero */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensajero-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'idCompania')->textInput() ?> -->
    <?= $form->field($model, 'idCompania')->dropDownList(ArrayHelper::map(Compania::find()->all(),'id','nombre'),['prompt'=>'Seleccione Compañía ..']); ?>
    
    <?= $form->field($model, 'nombreCompleto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
