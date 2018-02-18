<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
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
    Yii::$app->session['idInst']='1';
    NavBar::begin([
        'brandLabel' => 'Universidad Científica',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
    	['label' => 'Inicio', 'url' => ['/site/index']],
    	['label' => 'Admisión',
    		'items' => [
    				['label' => 'Postulantes', 'url' => ['/vendedores/index']],
    		]
    	],
        ['label' => 'Matrícula', 
        		'items' => [
        						['label' => 'Regulares', 'url' => ['/vendedores/index']],
            					['label' => 'Nuevos', 'url' => ['/pais/index']],
        					    ['label' => 'Cambios', 'url' => ['/provincia/index']],
           				    ]
        ],
        ['label' => 'Oferta Académica', 
        		'items' => [
        						['label' => 'Agregar', 'url' => ['/vendedores/index']],
            					['label' => 'Profesores', 
            							'items' => [
        									['label' => 'Regulares', 'url' => ['/vendedores/index']],
            								['label' => 'Nuevos', 'url' => ['/pais/index']],
        					    			['label' => 'Cambios', 'url' => ['/provincia/index']],
           				    			]            							
            					],
        					    
           					]
   		],
    	['label' => 'Calificaciones',
    		'items' => [
    				['label' => 'Ingreso', 'url' => ['/vendedores/index']],
    				['label' => 'Histórico', 'url' => ['/pais/index']],
    		]    		
    	],    		
    	['label' => 'Area Académica',
    		'items' => [
    				['label' => 'Escuelas', 'url' => ['/escuelas/index']],
    				['label' => 'Carreras', 'url' => ['/carreras/index']],
    				['label' => 'Cursos', 'url' => ['/cursos/index']],
    				['label' => 'Planes de Estudio', 'url' => ['/planesestudio/index']],
    				['label' => 'Cursos Planes', 'url' => ['/planescursos/index']],
    				['label' => 'Requisitos Correquisitos Cursos', 'url' => ['/planescursosreqcor/index']],
    		]
    		
    	],
    	['label' => 'Parámetros',
    		'items' => [
    				['label' => 'Períodos', 'url' => ['/periodoslectivos/index']],
    				['label' => 'Horarios', 'url' => ['/horarios/index']],
    				['label' => 'Modalidad', 'url' => ['/modalidad/index']],
    				['label' => 'Grados Académicos', 'url' => ['/gradosacademicos/index']],
    				['label' => 'Aulas', 'url' => ['/aulas/index']],
    				['label' => 'Tipo Aula', 'url' => ['/tipoaula/index']],
    				['label' => 'Sedes', 'url' => ['/sedes/index']],
    				['label' => 'Instituciones', 'url' => ['/instituciones/index']],
    				['label' => 'Tipo Instituciones', 'url' => ['/tipoinstitucion/index']],
    				['label' => 'Usuario', 'url' => ['/usuarios/index']],
    		]
    		
    	],
    ];
/**    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Registrarse', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Ingresar', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    } **/
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
        <p class="pull-left">&copy; UCT <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
