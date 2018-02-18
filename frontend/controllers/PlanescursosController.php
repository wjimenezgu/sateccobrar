<?php

namespace frontend\controllers;

use Yii;
use app\models\Planescursos;
use app\models\PlanescursosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanescursosController implements the CRUD actions for Planescursos model.
 */
class PlanescursosController extends Controller
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
     * Lists all Planescursos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PlanescursosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Planescursos model.
     * @param integer $idPlanEstudio
     * @param integer $idCurso
     * @return mixed
     */
    public function actionView($idPlanEstudio, $idCurso)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPlanEstudio, $idCurso),
        ]);
    }

    /**
     * Creates a new Planescursos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Planescursos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Planescursos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPlanEstudio
     * @param integer $idCurso
     * @return mixed
     */
    public function actionUpdate($idPlanEstudio, $idCurso)
    {
        $model = $this->findModel($idPlanEstudio, $idCurso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPlanEstudio' => $model->idPlanEstudio, 'idCurso' => $model->idCurso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Planescursos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPlanEstudio
     * @param integer $idCurso
     * @return mixed
     */
    public function actionDelete($idPlanEstudio, $idCurso)
    {
        $this->findModel($idPlanEstudio, $idCurso)->delete();

        return $this->redirect(['index']);
    }
    
    
    public function actionLists($id)
    {    	 
    	$countCursosPlan = Planescursos::find()->where(['idPlanEstudio'=>$id])
    	->count();
    
    	if ($countCursosPlan >  0 ) {
    		$cursosPlan = Planescursos::find()->where(['idPlanEstudio'=>$id])->orderBy('nombreCursoPlan')->all();
    		foreach($cursosPlan as $cursosPlanD){
    			echo "<option value='".$cursosPlanD->idCurso."'>".$cursosPlanD->nombreCursoPlan."</option>";
    		}
    	}else{
    		echo "<option> - </option>";
    	}
    }

    /**
     * Finds the Planescursos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPlanEstudio
     * @param integer $idCurso
     * @return Planescursos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPlanEstudio, $idCurso)
    {
        if (($model = Planescursos::findOne(['idPlanEstudio' => $idPlanEstudio, 'idCurso' => $idCurso])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
