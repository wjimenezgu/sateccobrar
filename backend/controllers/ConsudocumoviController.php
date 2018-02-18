<?php

namespace backend\controllers;

use Yii;
use backend\models\Movimientos;
use backend\models\MovimientosSearch;
use backend\models\Model;
use backend\models\Documovidet;
use backend\models\DocumovidetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * MovimientosController implements the CRUD actions for Movimientos model.
 */
class ConsudocumoviController extends Controller
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
     * Lists all Movimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movimientos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    //    return $this->render('view', [
    //        'model' => $this->findModel($id),
    //    ]);
    	$model = $this->findModel($id);

    	// die($id);
    	
    	
    	$searchModel = new DocumovidetSearch();
    	$searchModel->idDocMaestro=$id;
    	
    //	$searchModel->findAll('');

    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    //	$dataProvider = $searchModel->search();
 
    	return $this->render('_form', [
    			'model' 	   => $model,
    		 	'searchModel'  => $searchModel,
            	'dataProvider' => $dataProvider,
    	]);
    }

    /**
     * Creates a new Movimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movimientos();
        $modelsDocumovidet = [new Documovidet];
   
        if ($model->load(Yii::$app->request->post())) {

        	$modelsDocumovidet = Model::createMultiple(Documovidet::classname());
        	Model::loadMultiple($modelsDocumovidet, Yii::$app->request->post());
        	
        	// validate all models
        	$valid = $model->validate();
        	$valid = Model::validateMultiple($modelsDocumovidet) && $valid;
        	$model->userIns= Yii::$app->user->identity->username;
     //   	die('a validar');
        	if ($valid) {
      //  		die('es valido');
        		$transaction = \Yii::$app->db->beginTransaction();
        		try {
        			if ($flag = $model->save(false)) {
        				foreach ($modelsDocumovidet as $modelDocumovidet) {
        					$modelDocumovidet->idDocMaestro = $model->id;
        					$modelDocumovidet->userIns =  Yii::$app->user->identity->username;
        					if (! ($flag = $modelDocumovidet->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        					// se inserta ahora el movimento invertido para que concilie
        					// donde el idDocMaestro es el documento al que esta siendo aplicado
        					$modelDocumovidet->idDocMaestro = $modelDocumovidet->idDocAplica;
        					$modelDocumovidet->idDocAplica = $model->id;
        					$modelDocumovidet->userIns =  Yii::$app->user->identity->username;
        					if (! ($flag = $modelDocumovidet->save(false))) {
        						$transaction->rollBack();
        						break;
        					}
        				}
        			}
        			if ($flag) {
        				$transaction->commit();
        			//	return $this->redirect(['view', 'id' => $model->id]);
        				return $this->redirect(['index']);
        			}
        		} catch (Exception $e) {
        			$transaction->rollBack();
        		}
        	}        	
        }
        return $this->render('create', [
        		'model' => $model,
        		'modelsDocumovidet' => (empty($modelsDocumovidet)) ? [new Documovidet] : $modelsDocumovidet,
        ]);

    }

    /**
     * Updates an existing Movimientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsDocumovidet = $model->docuMoviDets;

        if ($model->load(Yii::$app->request->post())) {
            $oldIDs = ArrayHelper::map($modelsDocumovidet, 'id', 'id');
            $oldIDsAplica = ArrayHelper::map($modelsDocumovidet, 'idDocAplica', 'idDocAplica');
            $modelsDocumovidet = Model::createMultiple(Documovidet::classname(), $modelsDocumovidet);
            Model::loadMultiple($modelsDocumovidet, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDocumovidet, 'id', 'id')));
       //     $deletedIDsAplica = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsDocumovidet, 'idDocAplica', 'idDocAplica')));
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsDocumovidet) && $valid;
            
            if ($valid) {
            	$transaction = \Yii::$app->db->beginTransaction();
            	try {
            		if ($flag = $model->save(false)) {
            			if (! empty($deletedIDs)) {
            				Documovidet::deleteAll(['id' => $deletedIDs]);
            			}
            			if (! empty($oldIDsAplica)) {
            				Documovidet::deleteAll(['idDocAplica' => $model->id,'idDocMaestro'=>$oldIDsAplica]);
            			}
            			foreach ($modelsDocumovidet as $modelDocumovidet) {
            				$modelDocumovidet->idDocMaestro = $model->id;
            				$modelDocumovidet->userIns 		= Yii::$app->user->identity->username;
            				if (! ($flag = $modelDocumovidet->save(false))) {
            					$transaction->rollBack();
            					break;
            				}
            				// se inserta ahora el movimento invertido para que concilie
            				// donde el idDocMaestro es el documento al que esta siendo aplicado
            				$moviContraParte = new Documovidet;	
            				$moviContraParte->idDocMaestro = $modelDocumovidet->idDocAplica;            				
            				$moviContraParte->idDocAplica  = $model->id;
            				$moviContraParte->monto		   = $modelDocumovidet->monto;
            				$moviContraParte->userIns 	   = Yii::$app->user->identity->username;
            				if (! ($flag = $moviContraParte->save(false))) {
            					$transaction->rollBack();
            					break;
            				}
            			}
            		}
            		if ($flag) {
            			$transaction->commit();
            		//	return $this->redirect(['view', 'id' => $model->id]);
            			return $this->redirect(['index']);
            		}
            	} catch (Exception $e) {
            		$transaction->rollBack();
            	}
            }
                        
        }
        return $this->render('update', [
        		'model' => $model,
        		'modelsDocumovidet' => (empty($modelsDocumovidet)) ? [new Documovidet] : $modelsDocumovidet
        ]);
    }

    /**
     * Deletes an existing Movimientos model.
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
     * Finds the Movimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movimientos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
