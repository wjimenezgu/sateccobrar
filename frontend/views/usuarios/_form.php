<?php

use yii\helpers\Html;
use kartik\builder\Form;
use kartik\form\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="usuarios-form">
    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
    
    <?= Form::widget([
    'model' => $model,
    'form' => $form,
    'columns' => 1,
    'attributes' => [
    	'nombreCompleto' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Nombre Completo...']],
        'idAcceso' => ['type'=>Form::INPUT_TEXT, 'options'=>['placeholder'=>'Enter username...']],
        'claveAcceso' => ['type'=>Form::INPUT_PASSWORD, 'options'=>['placeholder'=>'Enter password...']],
    ]
		]);
    ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

