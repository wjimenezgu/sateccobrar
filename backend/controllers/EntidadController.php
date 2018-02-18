<?php

namespace backend\controllers;

use Yii;
use backend\models\Entidad;
use backend\models\EntidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\models\Entidadtelefono;
use backend\models\Entidadcontacto;
use backend\models\Model;

/**
 * EntidadController implements the CRUD actions for Entidad model.
 */
class EntidadController extends Controller
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
     * Lists all Entidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entidad model.
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
     * Creates a new Entidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entidad();
        $modelsTelefonos = [new Entidadtelefono];
        $modelsContactos = [new Entidadcontacto];
        

        if ($model->load(Yii::$app->request->post())) {
        	
        	// telefonos x entidad
        	$modelsTelefonos = Model::createMultiple(Entidadtelefono::classname());
        	Model::loadMultiple($modelsTelefonos, Yii::$app->request->post());
        	
        	
        	// contactos x entidad
        	$modelsContactos = Model::createMultiple(Entidadcontacto::classname());
        	Model::loadMultiple($modelsContactos, Yii::$app->request->post());
        	
        	
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelsTelefonos) && $valid;
        	$valid = Model::validateMultiple($modelsContactos) && $valid;
        	
        	if ($valid) {
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			$model->userIns= Yii::$app->user->identity->username;
        			if ($flag = $model->save(false)) {
        	
        				// telefonos x entidad
        				 
        				foreach ($modelsTelefonos as $modelTelefonos) {
        					$modelTelefonos->idEntidad = $model->id;
        	
        					if (! ($flag = $modelTelefonos->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        	
        	
        				// contactos x entidad
        				 
        				foreach ($modelsContactos as $modelContactos) {
        					$modelContactos->idEntidad = $model->id;
        					 
        					if (! ($flag = $modelContactos->save(false))) {
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
        	 
        	return $this->render('create', [
        			'model' => $model,
        			'modelsTelefonos' => (empty($modelsTelefonos)) ? [new Entidadtelefono] : $modelsTelefonos,
        			'modelsContactos' => (empty($modelsContactos)) ? [new Entidadcontacto] : $modelsContactos
        	]);
        	
    }

    /**
     * Updates an existing Entidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsTelefonos = $model->entidadTelefonos;
        $modelsContactos = $model->entidadContactos;

        if ($model->load(Yii::$app->request->post())) {
        	
        	// Telefonos x Entidad
        	$oldIDs = ArrayHelper::map($modelsTelefonos, 'id', 'id');
        	$modelsTelefonos = Model::createMultiple(Entidadtelefono::classname(), $modelsTelefonos);
        	Model::loadMultiple($modelsTelefonos, Yii::$app->request->post());
        	$deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTelefonos, 'id', 'id')));
        	 
        	// Contactos x Entidad
        	
        	$oldIDsC = ArrayHelper::map($modelsContactos, 'id', 'id');
        	$modelsContactos = Model::createMultiple(Entidadcontacto::classname(), $modelsContactos);
        	Model::loadMultiple($modelsContactos, Yii::$app->request->post());
        	$deletedIDsC = array_diff($oldIDsC, array_filter(ArrayHelper::map($modelsContactos, 'id', 'id')));
        	
        	
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelsTelefonos) && $valid;
        	$valid = Model::validateMultiple($modelsContactos) && $valid;
        	 
        	if ($valid) {
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			$model->userIns= Yii::$app->user->identity->username;
        			if ($flag = $model->save(false)) {
        				
        				// telefonos x entidad
        				if (! empty($deletedIDs)) {
        					Entidadtelefono::deleteAll(['id' => $deletedIDs]);
        				}
        	
        				foreach ($modelsTelefonos as $modelTelefonos) {
        					$modelTelefonos->idEntidad = $model->id;

        					if (! ($flag = $modelTelefonos->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        				
        				
        				// contactos x entidad
        				if (! empty($deletedIDsC)) {
        					Entidadcontacto::deleteAll(['id' => $deletedIDsC]);
        				}
        				 
        				foreach ($modelsContactos as $modelContactos) {
        					$modelContactos->idEntidad = $model->id;
        					
        					if (! ($flag = $modelContactos->save(false))) {
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
            	'modelsTelefonos' => (empty($modelsTelefonos)) ? [new Entidadtelefono] : $modelsTelefonos,
            	'modelsContactos' => (empty($modelsContactos)) ? [new Entidadcontacto] : $modelsContactos            		
            ]);
        
    }

    /**
     * Deletes an existing Entidad model.
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
     * Finds the Entidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entidad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
