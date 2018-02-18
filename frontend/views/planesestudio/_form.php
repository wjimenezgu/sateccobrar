<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Escuelas;
use app\models\Carreras;
use app\models\Modalidad;

/* @var $this yii\web\View */
/* @var $model app\models\Planesestudio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planesestudio-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    											[
    												'prompt'=>'Seleccione Institución',
    												'onchange'=>'
				    										$.post("index.php?r=escuelas/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#planesestudio-idescuela").html(data);
				    																});
    														$.post("index.php?r=modalidad/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#planesestudio-idmodalidad").html(data);
				    																});
    													',    													
    													]); ?>

	<?= $form->field($model,'idEscuela')->dropDownList(ArrayHelper::map(Escuelas::find()->all(),'idEscuela','nombreEscuela'),
												[
														'prompt'=>'Seleccione Escuela',
														'onchange'=>'
																$.post("index.php?r=carreras/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planesestudio-idcarrera").html(data);
																		});
																		',
														
												]); ?>

    <?= $form->field($model,'idCarrera')->dropDownList(ArrayHelper::map(Carreras::find()->all(),'idCarrera','nombreCarrera'),['prompt'=>'Seleccione Carrera']); ?>

    <?= $form->field($model, 'nombrePlanEstudio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idInstitucionPlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'idModalidad')->dropDownList(ArrayHelper::map(Modalidad::find()->all(),'idModalidad','descModalidad'),['prompt'=>'Seleccione Modalidad']); ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaAprobacion')->textInput() ?>

    <?= $form->field($model, 'numSesionAprobacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
