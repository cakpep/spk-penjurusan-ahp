<?php

namespace backend\controllers;

use Yii;
use app\models\Guru;
use app\models\GuruSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GuruController implements the CRUD actions for Guru model.
 */
class GuruController extends Controller
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
     * Lists all Guru models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Guru();
        $searchModel = new GuruSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Guru model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guru model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Guru();
        
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            $tgllahir = strtotime($post['Guru']['thn'].'-'.$post['Guru']['bln'].'-'.$post['Guru']['tgl']);
            $model->tgl_lahir = date('Y-m-d',$tgllahir);
            
            $foto =  UploadedFile::getInstance($model, 'foto');                                  
            if($foto){
                $ext = end((explode(".", $foto->name)));
                $extt=$foto->extension;
                $model->foto = Yii::$app->security->generateRandomString().".".$extt;
            }
        
            if($model->save()){
                if($foto){
                    $foto->saveAs('uploads/foto_guru/'. $model->foto);
                }
                $signUp = new \frontend\models\SignupForm();
                $signUp->username = $model->email;
                $signUp->email = $model->email;
                $signUp->password = $model->password;
                $signUp->level = 'guru';
                    // echo '<pre>';
        // print_r($signUp);die();
                if($signUp->signup()){
                    Yii::$app->session->setFlash('success', 'Simpan Berhasil');
                }else{
                    Yii::$app->session->setFlash('warning', 'Simpan Gagal');
                }
                return $this->redirect(['index']);
            }else{
                Yii::$app->session->setFlash('warning', 'Failed');
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Guru model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fotoD = $model->foto;
        if ($model->load(Yii::$app->request->post())) {
            
            $tgllahir = strtotime($_POST['Guru']['thn'].'-'.$_POST['Guru']['bln'].'-'.$_POST['Guru']['tgl']);
            $model->tgl_lahir = date('Y-m-d',$tgllahir);
            
            $foto =  UploadedFile::getInstance($model, 'foto');                                              

            if($foto){
                $extt=$foto->extension;
                $model->foto = Yii::$app->security->generateRandomString().".".$extt;
            }else{
                $model->foto = $fotoD;
            }

            if ($model->save()) {       
                if($foto){
                    $foto->saveAs('uploads/foto_guru/'. $model->foto);
                }
                Yii::$app->session->setFlash('success', 'Simpan Berhasil');                
                return $this->redirect(['view', 'id' => $model->nip]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Guru model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $foto = $model->foto;
        if($model->delete()){
            chmod('uploads/foto_guru/'.$foto,0777);
            unlink('uploads/foto_guru/'.$foto);    
        }        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Guru model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Guru the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guru::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
