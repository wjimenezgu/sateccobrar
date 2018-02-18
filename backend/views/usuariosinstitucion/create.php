<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Usuariosinstitucion */

$this->title = 'Create Usuariosinstitucion';
$this->params['breadcrumbs'][] = ['label' => 'Usuariosinstitucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuariosinstitucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
