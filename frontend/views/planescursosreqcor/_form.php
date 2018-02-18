<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Escuelas;
use app\models\Carreras;
use app\models\Planesestudio;
use app\models\Cursos;
use app\models\Planescursos;
use app\models\Indreqcor;

/* @var $this yii\web\View */
/* @var $model app\models\Planescursosreqcor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="planescursosreqcor-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    											[
    												'prompt'=>'Seleccione Institución',
    												'onchange'=>'
				    										$.post("index.php?r=escuelas/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#planescursosreqcor-idescuela").html(data);
				    																});
    														$.post("index.php?r=carreras/lists&id='.'"+"-1",
																		function (data) {
																			$("select#planescursosreqcor-idcarrera").html(data);
																		});
    														$.post("index.php?r=planesestudio/lists&id='.'"+"-1",
																		function (data) {
																			$("select#planescursosreqcor-idplanestudio").html(data);
																		});
    													',    													
    													]); ?>

    <?= $form->field($model,'idEscuela')->dropDownList(ArrayHelper::map(Escuelas::find()->all(),'idEscuela','nombreEscuela'),
												[
														'prompt'=>'Seleccione Escuela',
														'onchange'=>'
																$.post("index.php?r=carreras/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planescursosreqcor-idcarrera").html(data);
																		});
																		',
														
												]); ?>

    <?= $form->field($model,'idCarrera')->dropDownList(ArrayHelper::map(Carreras::find()->all(),'idCarrera','nombreCarrera'),
    											[
    													'prompt'=>'Seleccione Carrera',
    													'onchange'=>'
																$.post("index.php?r=planesestudio/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planescursosreqcor-idplanestudio").html(data);
																		});
																		',
    													
											    ]); ?>

    <?= $form->field($model,'idPlanEstudio')->dropDownList(ArrayHelper::map(Planesestudio::find()->all(),'idPlanEstudio','nombrePlanEstudio'),
    											[
    													'prompt'=>'Seleccione Plan de Estudio',
    													'onchange'=>'
																$.post("index.php?r=planescursos/lists&id='.'"+$(this).val(),
																		function (data) {
																			$("select#planescursosreqcor-idcurso").html(data);
																		});
																		',
    													
    											]); ?>
    
    <?= $form->field($model,'idCurso')->dropDownList(ArrayHelper::map(Planescursos::find()->all(),'idCurso','nombreCursoPlan'),['prompt'=>'Seleccionar Curso']); ?>

	<?= $form->field($model,'idCursoReqCor')->dropDownList(ArrayHelper::map(Planescursos::find()->all(),'idCurso','nombreCursoPlan'),['prompt'=>'Seleccionar Curso Requisito o Correquisito']); ?>  
    
    <?= $form->field($model,'idIndReqCor')->dropDownList(ArrayHelper::map(Indreqcor::find()->all(),'id','descripcion'),['prompt'=>'Indicar Requisito o Correquisito']); ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
