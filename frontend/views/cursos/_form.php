<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Escuelas;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    		                                   [
    		                                   		'prompt'=>'Seleccione Institución',
    		                                   		'onchange'=>'
				    										$.post("index.php?r=escuelas/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#cursos-idescuela").html(data);
				    																});'  		                                   		         
    											]); ?>
    

    <?= $form->field($model, 'idEscuela')->dropDownList(ArrayHelper::map(Escuelas::find()->all(),'idEscuela','nombreEscuela'),
    											[
    												'prompt'=>'Seleccione Escuela',
    										    ]); ?>    

    <?= $form->field($model, 'codigoCurso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombreCurso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creditos')->textInput() ?>

    <?= $form->field($model, 'horas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
