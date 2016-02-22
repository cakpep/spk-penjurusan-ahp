<?php

namespace backend\controllers;

use Yii;
use app\models\Nilai;
use app\models\NilaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
/**
 * NilaiController implements the CRUD actions for Nilai model.
 */
class NilaiController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                    
                    [
                        'actions' => ['index', 'create', 'update','delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Nilai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Nilai();
        $searchModel = new NilaiSearch();
        if(Yii::$app->user->identity->level=='guru'){
            $dataProvider = $searchModel->sqlLaporanNilai();
        }else{
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            
        }
        
         // validate if there is a editable input saved via AJAX
        if (Yii::$app->request->post('hasEditable')) {
            // instantiate your book model for saving
            $id = Yii::$app->request->post('editableKey');
            $model = Nilai::findOne($id);

            // store a default json response as desired by editable
            $out = Json::encode(['output'=>'', 'message'=>'']);
            $post = [];
            $posted = current($_POST['Nilai']);
            $post['Nilai'] = $posted;

            // load model like any single model validation
            if ($model->load($post)) {               
                $model->save();
                $output = '';                
                if (isset($posted['nilai'])) {
                   $output =  $model->nilai;//Yii::$app->formatter->asDecimal($model->nilai, 2);
                } 

                // similarly you can check if the name attribute was posted as well
                // if (isset($posted['name'])) {
                //   $output =  ''; // process as you need
                // } 
                $out = Json::encode(['output'=>$output, 'message'=>'']);
            } 
            // return ajax json encoded response and exit
            echo $out;
            return;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Nilai model.
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
     * Creates a new Nilai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Nilai();
       

        if ($model->load(Yii::$app->request->post())) { 
        // echo '<pre>';  
            // print_r($model); die();
                if($model->save()){
                Yii::$app->session->setFlash('success', 'Simpan Berhasil');    
                }else{
                    Yii::$app->session->setFlash('warning', 'Failed');   
                }            
        } else {
             Yii::$app->session->setFlash('danger', 'Error');
        }
        return $this->redirect(['index']);
    }
    

    /**
     * Updates an existing Nilai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_nilai]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Nilai model.
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
     * Finds the Nilai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Nilai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Nilai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
