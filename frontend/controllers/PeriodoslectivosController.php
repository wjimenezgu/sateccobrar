<?php

namespace frontend\controllers;

use Yii;
use app\models\Periodoslectivos;
use app\models\PeriodoslectivosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeriodoslectivosController implements the CRUD actions for Periodoslectivos model.
 */
class PeriodoslectivosController extends Controller
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
     * Lists all Periodoslectivos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PeriodoslectivosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Periodoslectivos model.
     * @param integer $idModalidad
     * @param string $idPeriodoLectivo
     * @return mixed
     */
    public function actionView($idModalidad, $idPeriodoLectivo)
    {
        return $this->render('view', [
            'model' => $this->findModel($idModalidad, $idPeriodoLectivo),
        ]);
    }

    /**
     * Creates a new Periodoslectivos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Periodoslectivos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idModalidad' => $model->idModalidad, 'idPeriodoLectivo' => $model->idPeriodoLectivo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Periodoslectivos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idModalidad
     * @param string $idPeriodoLectivo
     * @return mixed
     */
    public function actionUpdate($idModalidad, $idPeriodoLectivo)
    {
        $model = $this->findModel($idModalidad, $idPeriodoLectivo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idModalidad' => $model->idModalidad, 'idPeriodoLectivo' => $model->idPeriodoLectivo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Periodoslectivos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idModalidad
     * @param string $idPeriodoLectivo
     * @return mixed
     */
    public function actionDelete($idModalidad, $idPeriodoLectivo)
    {
        $this->findModel($idModalidad, $idPeriodoLectivo)->delete();

        return $this->redirect(['index']);
    }

  
    
    /**
     * Finds the Periodoslectivos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idModalidad
     * @param string $idPeriodoLectivo
     * @return Periodoslectivos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idModalidad, $idPeriodoLectivo)
    {
        if (($model = Periodoslectivos::findOne(['idModalidad' => $idModalidad, 'idPeriodoLectivo' => $idPeriodoLectivo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function beforeSave($insert)
    {   
    	if ($this->isNewRecord) {
    		$this->fecIniPeriodoNatu = '2015-11-2';
  
    	}
    	
    	return parent::beforeSave($insert);
    }
}
