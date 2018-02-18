<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;

/* @var $this yii\web\View */
/* @var $model app\models\Modalidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modalidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),['prompt'=>'Seleccione Institución']); ?>

    <?= $form->field($model, 'descModalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descBloquePlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantMeses')->textInput() ?>

    <?= $form->field($model, 'anioInicioPeriodo')->textInput() ?>

    <?= $form->field($model, 'ultAnioGenPeriodo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
