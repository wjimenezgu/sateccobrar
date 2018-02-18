<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
     //   'brandLabel' => Yii::$app->session['InstName'],
    	'brandLabel' =>	isset(Yii::$app->session['ciaName']) ? Yii::$app->session['ciaName'] : 'CxC CxP Aplicación',
    		
    		
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
    ];
    
    // en funcion del nivel de acceso del usuario idNivelAcceso
    // se definen las opciones del menu.
    //
    
    switch (Yii::$app->session["idNivelAcceso"]){
    	case '1':
    		$menuItems = [
    	['label' => 'Inicio', 'url' => ['/site/index']],
    	['label' => 'Documentos',
    		'items' => [
    				['label' => 'Ingreso', 'url' => ['/documento/index']],
    				['label' => 'Ingreso Recibos', 'url' => ['/recibo/create']],
    				['label' => 'Aplicar Recibos', 'url' => ['/reciboapli/index']],
    				['label' => 'Facturas', 'url' => ['/factura/selfacturas']],
    				['label' => 'Aplicar Movimientos', 'url' => ['/movimientos/index']],
    			//	['label' => 'Movidocu', 'url' => ['/movidocu/index']],
    				['label' => 'Adelantos', 'url' => ['/movidocu/index']],
    				['label' => 'Anulación', 'url' => ['/anulacion/index']],
    				['label' => 'Consulta', 'url' => ['/consudocu/index']],
    				['label' => 'Consulta Movim.', 'url' => ['/consudocumovi/index']],
    				['label' => 'Estado Cuenta', 'url' => ['/estadocuenta/index']],
    				['label' => 'Documentos', 'url' => ['/docu/index']],
    		]
    	],
    	['label' => 'Clientes',
    	'items' => [
    			['label' => 'Mantenimiento', 'url' => ['/cliprocia/index']],
    			['label' => 'Entidad', 'url' => ['/entidad/index']],
    			['label' => 'Entidad en CxC', 'url' => ['/clipro/index']],
    	]
    	],
    	['label' => 'Reportes',
    	'items' => [
    			['label' => 'Antigüedad de Saldos', 'url' => ['/documento/index']],
    			['label' => 'Proyección de Cobro', 'url' => ['/movidocu/index']],
    	]
    	],
    	['label' => 'Parámetros',
    		'items' => [
    				['label' => 'Talonarios', 'url' => ['/talonario/index']],
    				['label' => 'Bancos', 'url' => ['/banco/index']],
    				['label' => 'Tipo Documentos', 'url' => ['/tipodocumento/index']],
    				['label' => 'Monedas', 'url' => ['/moneda/index']],
    				['label' => 'Tipo Entidad', 'url' => ['/tipoentidad/index']],
    				['label' => 'Puestos Contactos', 'url' => ['/puesto/index']],
    				['label' => 'Tipo Telefonos', 'url' => ['/tipotelefono/index']],
    				['label' => 'Estado Documentos', 'url' => ['/estadodocumento/index']],
    				['label' => 'Compañías', 'url' => ['/compania/index']],
    				['label' => 'Mensajeros', 'url' => ['/mensajero/index']],
    				['label' => 'Estado Talonario', 'url' => ['/estadotalonario/index']],
    				['label' => 'Usuario', 'url' => ['/usuarios/index']],
    		]
    		
    	],
    ];
    		break;
    	
    	case '2':
    		$menuItems = [
    	['label' => 'Inicio', 'url' => ['/site/index']],
    	['label' => 'Documentos',
    		'items' => [
    				['label' => 'Ingreso', 'url' => ['/documento/index']],
    				['label' => 'Ingreso Recibos', 'url' => ['/recibo/create']],
    				['label' => 'Aplicar Recibos', 'url' => ['/reciboapli/index']],
    				['label' => 'Aplicar Movimientos', 'url' => ['/movimientos/index']],    				
    				['label' => 'Consulta Movim.', 'url' => ['/consudocumovi/index']],
    				['label' => 'Estado Cuenta', 'url' => ['/estadocuenta/index']],
                                ['label' => 'Reversar Movimientos', 'url' => ['/revmovimientos/index']],
    		]
    	],
    	['label' => 'Clientes',
    	'items' => [
    			['label' => 'Datos Generales', 'url' => ['/entidad/index']],
    			['label' => 'Asignar en CxC', 'url' => ['/clipro/index']],
    			['label' => 'Asignar a Compañia', 'url' => ['/cliprocia/index']],
    	]
    	],
    	['label' => 'Parámetros',
    	'items' => [
    			['label' => 'Talonarios', 'url' => ['/talonario/index']],
    			['label' => 'Bancos', 'url' => ['/banco/index']],
    			['label' => 'Tipo Documentos', 'url' => ['/tipodocumento/index']],
    			['label' => 'Tipo Entidad', 'url' => ['/tipoentidad/index']],
    			['label' => 'Puestos Contactos', 'url' => ['/puesto/index']],
    			['label' => 'Tipo Telefonos', 'url' => ['/tipotelefono/index']],
    			['label' => 'Estado Documentos', 'url' => ['/estadodocumento/index']],
    			['label' => 'Mensajeros', 'url' => ['/mensajero/index']],
    			['label' => 'Estado Talonario', 'url' => ['/estadotalonario/index']],
    	]    	
    	],
    ];
    		break;
    }

    
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Ingresar', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Salir (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; eTecno <?= date('Y') ?></p>

    <!--     <p class="pull-right"><?= Yii::powered() ?></p>  -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
