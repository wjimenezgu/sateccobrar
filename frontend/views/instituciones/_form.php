<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tipoinstitucion;

/* @var $this yii\web\View */
/* @var $model app\models\Instituciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreInstitucion')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'idTipoInstitucion')->textInput() ?>  --> 
    
    <?= $form->field($model,'idTipoInstitucion')->dropDownList(ArrayHelper::map(Tipoinstitucion::find()->all(),'id','descripcion'),['prompt'=>'Seleccione Tipo Institución']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
