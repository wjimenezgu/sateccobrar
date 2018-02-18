<?php

namespace backend\controllers;

use Yii;
use backend\models\Usuariocia;
use backend\models\UsuariociaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariociaController implements the CRUD actions for Usuariocia model.
 */
class UsuariociaController extends Controller
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
     * Lists all Usuariocia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuariociaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuariocia model.
     * @param integer $idCompania
     * @param integer $iduser
     * @return mixed
     */
    public function actionView($idCompania, $iduser)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCompania, $iduser),
        ]);
    }

    /**
     * Creates a new Usuariocia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuariocia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCompania' => $model->idCompania, 'iduser' => $model->iduser]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuariocia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCompania
     * @param integer $iduser
     * @return mixed
     */
    public function actionUpdate($idCompania, $iduser)
    {
        $model = $this->findModel($idCompania, $iduser);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCompania' => $model->idCompania, 'iduser' => $model->iduser]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuariocia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCompania
     * @param integer $iduser
     * @return mixed
     */
    public function actionDelete($idCompania, $iduser)
    {
        $this->findModel($idCompania, $iduser)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuariocia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCompania
     * @param integer $iduser
     * @return Usuariocia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCompania, $iduser)
    {
        if (($model = Usuariocia::findOne(['idCompania' => $idCompania, 'iduser' => $iduser])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
