<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Escuelas;
use app\models\Carreras;
use app\models\Planesestudio;
use app\models\Cursos;

/* @var $this yii\web\View */
/* @var $model app\models\Planescursos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planescursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    											[
    												'prompt'=>'Seleccione Institución',
    												'onchange'=>'
				    										$.post("index.php?r=escuelas/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#planescursos-idescuela").html(data);
				    																});
    														$.post("index.php?r=carreras/lists&id='.'"+"-1",
																		function (data) {
																			$("select#planescursos-idcarrera").html(data);
																		});
    														$.post("index.php?r=planesestudio/lists&id='.'"+"-1",
																		function (data) {
																			$("select#planescursos-idplanestudio").html(data);
																		});
    													',    													
    													]); ?>

    <?= $form->field($model,'idEscuela')->dropDownList(ArrayHelper::map(Escuelas::find()->all(),'idEscuela','nombreEscuela'),
												[
														'prompt'=>'Seleccione Escuela',
														'onchange'=>'
																$.post("index.php?r=carreras/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planescursos-idcarrera").html(data);
																		});
																		',
														
												]); ?>

    <?= $form->field($model,'idCarrera')->dropDownList(ArrayHelper::map(Carreras::find()->all(),'idCarrera','nombreCarrera'),
    											[
    													'prompt'=>'Seleccione Carrera',
    													'onchange'=>'
																$.post("index.php?r=planesestudio/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planescursos-idplanestudio").html(data);
																		});
																		',
    													
											    ]); ?>

    
    <?= $form->field($model,'idPlanEstudio')->dropDownList(ArrayHelper::map(Planesestudio::find()->all(),'idPlanEstudio','nombrePlanEstudio'),['prompt'=>'Seleccione Plan']); ?>
    
    <?= $form->field($model,'idCurso')->dropDownList(ArrayHelper::map(Cursos::find()->orderBy('nombreCurso')->all(),'idCurso','nombreCurso'),['prompt'=>'Seleccione Curso']); ?>

    <?= $form->field($model, 'codigoCursoPlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombreCursoPlan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nivel')->textInput() ?>

    <?= $form->field($model, 'posOrden')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
