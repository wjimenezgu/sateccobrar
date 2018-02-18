<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Usuarios', ['value'=>Url::to('index.php?r=usuarios/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
  
  <?php 
   Modal::begin([
    	'header' => '<h4>Crear Usuario</h4>',
    	'id'=> 'modal',
    		'size'=>'modal-lg',
			]);
		echo "<div id='modalContent'></div>";
	Modal::end(); 
 ?>   
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUsuario',
            'nombreCompleto',
            'idAcceso',
        //    'claveAcceso',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
