<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use app\models\Sedes;
use app\models\Tipoaula;
use app;
use app\models\Aulas;

/* @var $this yii\web\View */
/* @var $model app\models\Aulas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aulas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),
    		                                   [
    		                                   		'prompt'=>'Seleccione Institución',
    		                                   		'onchange'=>'
    		                                   				
				    										$.post("index.php?r=sedes/lists&id='.'"+$(this).val(),
    		                   														function (data) {
					    																$("select#aulas-idsede").html(data);
				    																});'  		                                   		         
    											]); ?>

    <?= $form->field($model, 'idSede')->dropDownList(ArrayHelper::map(Sedes::find()->all(),'id','nombreSede'),
    											[
    												'prompt'=>'Seleccione Sede',
    										    ]); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidad')->textInput() ?>

    <?= $form->field($model, 'idTipoAula')->dropDownList(ArrayHelper::map(Tipoaula::find()->all(),'idTipoAula','descTipoAula'),['prompt'=>'Seleccione Tipo Aula']); ?>

    <?= $form->field($model, 'localizacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
