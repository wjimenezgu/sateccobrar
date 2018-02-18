<?php

namespace backend\controllers;

use Yii;
use backend\models\Clipro;
use backend\models\CliproSearch;
use backend\models\Cliprotrampagcob;
use backend\models\Cliprocuenta;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * CliproController implements the CRUD actions for Clipro model.
 */
class CliproController extends Controller
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
     * Lists all Clipro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CliproSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clipro model.
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
     * Creates a new Clipro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clipro();
        $modelsTramPagCob = [new Cliprotrampagcob];
        $modelsCuenta = [new Cliprocuenta];

        if ($model->load(Yii::$app->request->post())) {

            if ($model->load(Yii::$app->request->post())) {
            
                // tramites cliente
                $modelsTramPagCob = Model::createMultiple(Cliprotrampagcob::classname());
                Model::loadMultiple($modelsTramPagCob, Yii::$app->request->post());
                
                
                // Cuentas x cliente
                $modelsCuenta = Model::createMultiple(Cliprocuenta::classname());
                Model::loadMultiple($modelsCuenta, Yii::$app->request->post());
                
                
                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsTramPagCob) && $valid;
                $valid = Model::validateMultiple($modelsCuenta) && $valid;
                
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        
                        if ($flag = $model->save(false)) {
                
                            // tramites x cliente
                             
                            foreach ($modelsTramPagCob as $modelTramPagCob) {
                                $modelTramPagCob->idCliPro = $model->id;
                
                                if (! ($flag = $modelTramPagCob->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                
                
                            // Cuentas x cliente
                             
                            foreach ($modelsCuenta as $modelCuenta) {
                                $modelCuenta->idCliPro = $model->id;
                                 
                                if (! ($flag = $modelCuenta->save(false))) {
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
        }
            

        return $this->render('create', [
            'model' => $model,
        	'modelsTramPagCob' => (empty($modelsTramPagCob)) ? [new Cliprotrampagcob] : $modelsTramPagCob,
        	'modelsCuenta' => (empty($modelsCuenta)) ? [new Cliprocuenta] : $modelsCuenta,
        ]);
        
    }

    /**
     * Updates an existing Clipro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsTramPagCob = $model->cliProTramPagCobs;
        $modelsCuenta     = $model->cliProCuentas;

        if ($model->load(Yii::$app->request->post())) {

            // tramites cliente
            $oldIDs = ArrayHelper::map($modelsTramPagCob, 'id', 'id');
            $modelsTramPagCob = Model::createMultiple(Cliprotrampagcob::classname(), $modelsTramPagCob);
            Model::loadMultiple($modelsTramPagCob, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsTramPagCob, 'id', 'id')));
             
            // Cuentas x cliente
            
            $oldIDsC = ArrayHelper::map($modelsCuenta, 'id', 'id');
            $modelsCuenta = Model::createMultiple(Cliprocuenta::classname(), $modelsCuenta);
            Model::loadMultiple($modelsCuenta, Yii::$app->request->post());
            $deletedIDsC = array_diff($oldIDsC, array_filter(ArrayHelper::map($modelsCuenta, 'id', 'id')));
            
            
            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTramPagCob) && $valid;
            $valid = Model::validateMultiple($modelsCuenta) && $valid;
             
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    
                    if ($flag = $model->save(false)) {
                        
                        // tramites cliente
                        if (! empty($deletedIDs)) {
                            Cliprotrampagcob::deleteAll(['id' => $deletedIDs]);
                        }
            
                        foreach ($modelsTramPagCob as $modelTramPagCob) {
                            $modelTramPagCob->idCliPro = $model->id;

                            if (! ($flag = $modelTramPagCob->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                        
                        // Cuentas x cliente
                        if (! empty($deletedIDsC)) {
                            Cliprocuenta::deleteAll(['id' => $deletedIDsC]);
                        }
                         
                        foreach ($modelsCuenta as $modelCuenta) {
                            $modelCuenta->idCliPro = $model->id;
                            
                            if (! ($flag = $modelCuenta->save(false))) {
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
        	'modelsTramPagCob' => (empty($modelsTramPagCob)) ? [new Cliprotrampagcob] : $modelsTramPagCob,
        	'modelsCuenta'    => (empty($modelsCuenta))     ? [new Cliprocuenta]     : $modelsCuenta,
        ]);
        
    }

    /**
     * Deletes an existing Clipro model.
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
     * Finds the Clipro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clipro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clipro::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
