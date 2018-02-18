<?php

namespace frontend\controllers;

use Yii;
use app\models\Tipoinstitucion;
use app\models\TipoinstitucionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\base\InvalidCallException;

/**
 * TipoinstitucionController implements the CRUD actions for Tipoinstitucion model.
 */
class TipoinstitucionController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tipoinstitucion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TipoinstitucionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tipoinstitucion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $model=$this->findModel($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	Yii::$app->session->setFlash('kv-detail-success', 'Registro guardado exitosamente.');
        	// Multiple alerts can be set like below
        	//Yii::$app->session->setFlash('kv-detail-warning', 'A last warning for completing all data.');
        	//Yii::$app->session->setFlash('kv-detail-info', '<b>Note:</b> You can proceed by clicking <a href="#">this link</a>.');
        	return $this->redirect(['view', 'id'=>$model->id]);
        } else {
        	return $this->render('view', ['model'=>$model]);
        }
                
    }

    /**
     * Creates a new Tipoinstitucion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tipoinstitucion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tipoinstitucion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
/**
 *  Usando Detail view de kartik el action update no se necesita.
 *     public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
*/

    /**
     * Deletes an existing Tipoinstitucion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
                        
        if (Yii::$app->request->post()) {
        	$this->findModel($id)->delete();
        	return $this->redirect(['index']);
        }
         
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && isset($post['custom_param'])) {
        	$id = $post['id'];
        	if ($this->findModel($id)->delete()) {
        		echo Json::encode([
        				'success' => true,
        				'messages' => [
        						'kv-detail-info' => 'Tipo Institución # ' . $id . ' fue borrada exitosamente. <a href="' .
        						Url::to(['/site/view']) . '" class="btn btn-sm btn-info">' .
        						'<i class="glyphicon glyphicon-hand-right"></i>  Click aquí</a> para proceder.'
        				]
        		]);
        	} else {
        		echo Json::encode([
        				'success' => false,
        				'messages' => [
        						'kv-detail-error' => 'No se puede borrar Tipo Institución # ' . $id . '.'
        				]
        		]);
        	}
        	return;
        }elseif (Yii::$app->request->post()) {
        	$this->findModel($id)->delete();
        	return $this->redirect(['index']);
        }
        throw new InvalidCallException("No tiene privilegios para borrar. Contacte al administrador.");
                                
    }

    /**
     * Finds the Tipoinstitucion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tipoinstitucion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tipoinstitucion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}
