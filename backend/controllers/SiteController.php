<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Usuariosinstitucion;
use backend\models\Instituciones;
use backend\models\Compania;
use backend\models\Usuariocia;
use yii\helpers\ArrayHelper;
use backend\models\Tiposistema;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

    	// como el usuario es valido se procede a crear las variables de sesion 
    	// para definir cual institucion tiene asignada
    	// por ahora cada usuario tiene asignado SOLA una instiucion
    	// en el futuro la idea seria que se una LISTBOX donde el usuario puede cambiar la 
    	// institucion activa
    	// el nombre se despliega en el menu.
    	
    	$usuarioCia = Usuariocia::findOne(['idUser' => \Yii::$app->user->identity->id]);
    	\Yii::$app->session["idCia"]         = ArrayHelper::getValue($usuarioCia,'idCompania');
    	\Yii::$app->session["idTipoSist"]    = 1;
    	\Yii::$app->session["idNivelAcceso"] = ArrayHelper::getValue($usuarioCia,'idNivelAcceso');   
   		\Yii::$app->session["ciaName"]       = ArrayHelper::getValue(Compania::findOne(['id' => \Yii::$app->session["idCia"]]),'nombre');
   		\Yii::$app->session["sysName"]       = ArrayHelper::getValue(Tiposistema::findOne(['id' => \Yii::$app->session["idTipoSist"]]),'descripcion');
    	return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
    	// se limpian las variables de ambiente para mantener la institucion seleccionada y el nombre.
    	unset(\Yii::$app->session["idInst"]);
    	unset(\Yii::$app->session["InstName"]);
    	unset(\Yii::$app->session["idNivelAcceso"]);
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
