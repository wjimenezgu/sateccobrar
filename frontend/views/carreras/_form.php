<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Gradosacademicos;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Escuelas;

/* @var $this yii\web\View */
/* @var $model app\models\Carreras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carreras-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    											[
    												'prompt'=>'Seleccione Institución',
    												'onchange'=>'
				    										$.post("index.php?r=escuelas/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#carreras-idescuela").html(data);
				    																});
    														$.post("index.php?r=gradosacademicos/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#carreras-idgrado").html(data);
				    																});
    													',    													
    													]); ?>
    
    <?= $form->field($model,'idEscuela')->dropDownList(ArrayHelper::map(Escuelas::find()->all(),'idEscuela','nombreEscuela'),['prompt'=>'Seleccione Escuela']); ?>
    
    <?= $form->field($model,'idGrado')->dropDownList(ArrayHelper::map(Gradosacademicos::find()->all(),'idGrado','nombreGrado'),['prompt'=>'Seleccione Grado Académico']); ?>

    <?= $form->field($model, 'nombreCarrera')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
