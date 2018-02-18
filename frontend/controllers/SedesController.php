<?php

namespace frontend\controllers;

use Yii;
use app\models\Sedes;
use app\models\SedesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SedesController implements the CRUD actions for Sedes model.
 */
class SedesController extends Controller
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
     * Lists all Sedes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SedesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sedes model.
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
     * Creates a new Sedes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sedes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
        	
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sedes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
/**    
    public function actionUpdate($id)
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
     * Deletes an existing Sedes model.
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
        						'kv-detail-info' => 'Sede # ' . $id . ' fue borrada exitosamente. <a href="' .
        						Url::to(['/site/view']) . '" class="btn btn-sm btn-info">' .
        						'<i class="glyphicon glyphicon-hand-right"></i>  Click aquí</a> para proceder.'
        				]
        		]);
        	} else {
        		echo Json::encode([
        				'success' => false,
        				'messages' => [
        						'kv-detail-error' => 'No se puede borrar Sede # ' . $id . '.'
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
    
    
    public function actionLists($id) 
    {
    	\Yii::$app->session["idInst"] = $id;
    	
    	$countSedes = Sedes::find()->where(['idInstitucion'=>\Yii::$app->session["idInst"]])
    	->count();
    	
    	//$countSedes = Sedes::find()->where(['idInstitucion'=>$id])
    	//							->count();    	
    	if ($countSedes >  0 ) {
    		$sedes = Sedes::find()->where(['idInstitucion'=>$id])->all();
    		foreach($sedes as $sedeD){    			
    			echo "<option value='".$sedeD->id."'>".$sedeD->nombreSede."</option>";
    		}    		
    	}else{
    		echo "<option> - </option>";
    	}
    }
    
    public function actionListssp($id)
    {

    	\Yii::$app->session["idInst"] = $id;
    	
    	try {
    		$sql =  'call spListaSedes('.$id.')' ;
    		 
    		$command = \Yii::$app->db->createCommand($sql);
    		$sedes = $command->queryAll();
    		
    	}catch (Exception $e) {
    		Log::trace("Error : ".$e);
    		throw new Exception("Error : ".$e);
    	}
    	foreach($sedes as $sedeD){
    		echo "<option value='".$sedeD['id']."'>".$sedeD['nombreSede']."</option>";
    	}
    }

    /**
     * Finds the Sedes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sedes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sedes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
