<?php

namespace backend\controllers;

use Yii;
use backend\models\Documovi;
use backend\models\DocumoviSearch;
use backend\models\Documovidet;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DocumoviController implements the CRUD actions for Documovi model.
 */
class DocumoviController extends Controller
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
     * Lists all Documovi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumoviSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documovi model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Documovi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documovi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDocumento]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Documovi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDocuMoviDets = $model->docuMoviDets;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	// MOVIMIENTOS DEL DOCUMENTO
        	$oldIDs = ArrayHelper::map($modelDocuMoviDets, 'id', 'id');
        	$modelDocuMoviDets = Model::createMultiple(Documovidet::classname(), $modelDocuMoviDets);
        	Model::loadMultiple($modelDocuMoviDets, Yii::$app->request->post());
        	$deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelDocuMoviDets, 'id', 'id')));
        	
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelDocuMoviDets) && $valid;
        	
        	if ($valid) {
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			if ($flag = $model->save(false)) {
        				// MOVIMIENTOS DEL DOCUMENTO
        				if (! empty($deletedIDs)) {
        					Documovidet::deleteAll(['id' => $deletedIDs]);
        				}
        				foreach ($modelDocuMoviDets as $modelDocuMoviDet) {
        					$modelDocuMoviDet->idDocMaestro = $model->idDocumento;
        					if (! ($flag = $modelDocuMoviDet->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        	
        			}
        			if ($flag) {
        				$transaction->commit();
        				return $this->redirect(['index']);
        				// se decide mejor no enviar a viw update, para escribir menos codigo.
        				// return $this->redirect(['view', 'id' => $model->idPersona]);
        				 
        			}
        		} catch (Exception $e) {
        			$transaction->rollBack();
        		}
        	}
        }
        	 
        return $this->render('update', [
        			'model' => $model,
        			'modelDocuMoviDets' => (empty($modelDocuMoviDets)) ? [new Documovidet] : $modelDocuMoviDets
         ]);
    }

    /**
     * Deletes an existing Documovi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Documovi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documovi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documovi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
