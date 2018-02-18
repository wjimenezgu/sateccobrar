<?php

namespace backend\controllers;

use Yii;
use backend\models\Documento;
use backend\models\DocumentoSearch;
use backend\models\Docuasoci;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * DocumentoController implements the CRUD actions for Documento model.
 */
class ReciboController extends Controller
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
     * Lists all Documento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documento model.
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
     * Creates a new Documento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documento();
        $modelsDocuasoci =  [new Docuasoci];
        $model->fecha = date('Y-m-d');
        if ($model->load(Yii::$app->request->post())) {
   	
        	$modelsDocuasoci = Model::createMultiple(Docuasoci::classname());
        	Model::loadMultiple($modelsDocuasoci, Yii::$app->request->post());
        	 
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelsDocuasoci) && $valid;
        	if ($valid) {
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			$model->userIns= Yii::$app->user->identity->username;
        			$model->idEstadoDocumento=1; // ACTIVO
        			$model->idMoneda=1; // COLONES
        			if ($flag = $model->save(false)) {
        				foreach ($modelsDocuasoci as $modelDocuasoci) {
        					$modelDocuasoci->idDocumento = $model->id;
        					$modelDocuasoci->userIns =  Yii::$app->user->identity->username;
        					if (! ($flag = $modelDocuasoci->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        			}
        			if ($flag) {
        				$transaction->commit();
        				
        				return $this->redirect(['reciboapli/update', 'id' => $model->id]);
        			//	return $this->redirect(['index']);
        			}
        		} catch (Exception $e) {
        			$transaction->rollBack();
        		}
        	}
        }       	
        return $this->render('create', [
                'model' => $model,
            	'modelsDocuasoci' => (empty($modelsDocuasoci)) ? [new Docuasoci] : $modelsDocuasoci,
            		
            		
            ]);

    }

    /**
     * Updates an existing Documento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsDocuasoci =  $model->docuAsocis;
                
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$oldIDs = ArrayHelper::map($modelsDocuasoci, 'id', 'id');
        	$modelsDocuasoci = Model::createMultiple(Docuasoci::classname(), $modelsDocuasoci);
        	Model::loadMultiple($modelsDocuasoci, Yii::$app->request->post());
        	$deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDocuasoci, 'id', 'id')));
        	
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelsDocuasoci) && $valid;
        	
        	if ($valid) {
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			$model->userMod= Yii::$app->user->identity->username;
        			if ($flag = $model->save(false)) {
        				if (! empty($deletedIDs)) {
        					docuAsocisi::deleteAll(['id' => $deletedIDs]);
        				}

        				foreach ($modelsDocuasoci as $modelDocuasoci) {
        					$modelDocuasoci->idDocumento = $model->id;
        					$modelDocuasoci->userIns 	 = Yii::$app->user->identity->username;
        					if (! ($flag = $modelDocuasoci->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        			}
        			if ($flag) {
        				$transaction->commit();
        				return $this->redirect(['index']);
        			}
        		} catch (Exception $e) {
        			$transaction->rollBack();
        		}
        	}
        	
        	}
            return $this->render('update', [
                'model' => $model,
            	'modelsDocuasoci' => (empty($modelsDocuasoci)) ? [new Docuasoci] : $modelsDocuasoci,
            ]);

    }

    /**
     * Deletes an existing Documento model.
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
     * Finds the Documento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documento::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
