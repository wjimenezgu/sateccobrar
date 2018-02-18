<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Instituciones;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\Sedes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sedes-form">

    <?php $form = ActiveForm::begin(); ?>

 <!--      <?= $form->field($model, 'idInstitucion')->textInput() ?>   -->    
    
 <!--    <?= $form->field($model,'idInstitucion')->dropDownList(ArrayHelper::map(Instituciones::find()->all(),'id','nombreInstitucion'),['prompt'=>'Seleccione Institución']); ?>   -->
 
 	<?= Html::activeHiddenInput($model, 'idInstitucion',array('value'=>\Yii::$app->session['idInst'])) ;?>
 
    <?= $form->field($model, 'nombreSede')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
