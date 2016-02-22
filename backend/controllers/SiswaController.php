<?php

namespace backend\controllers;

use Yii;
use app\models\Siswa;
use app\models\Nilai;
use app\models\MatapelajaranGuru;
use app\models\SiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class SiswaController extends Controller
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
     * Lists all Siswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiswaSearch();
     
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Siswa model.
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
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Siswa();

        $nilai = new Nilai();

        $post = Yii::$app->request->post();
        if ($model->load($post)) {
            $tgllahir = strtotime($post['Siswa']['thn'].'-'.$post['Siswa']['bln'].'-'.$post['Siswa']['tgl']);
            $model->tgl_lahir = date('Y-m-d',$tgllahir);
            
            $foto =  UploadedFile::getInstance($model, 'foto');                                  
            if($foto){
                $ext = end((explode(".", $foto->name)));
                $extt=$foto->extension;
                $model->foto = Yii::$app->security->generateRandomString().".".$extt;
            }

            if($model->save()){
                if($foto){
                    mkdir('uploads/foto_siswa',0777,true);
                    $foto->saveAs('uploads/foto_siswa/'. $model->foto);
                }
                
                $signUp = new \frontend\models\SignupForm();
                $signUp->username = $model->email;
                $signUp->email = $model->email;
                $signUp->password = $model->password;
                $signUp->level = 'Siswa';
                
                $mapel = MatapelajaranGuru::find()->all();

                foreach ($mapel as $key => $value) {
                    $nilai->nis =  $model->nis;
                    $nilai->id_matapelajaran =  $value->id_matapelajaran_guru;
                    $nilai->tahun_ajaran =  $_POST['Nilai']['tahun_ajaran'];
                    if($nilai->save()){
                        $nilai = new Nilai();
                    }
                                             
                }
              
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
                'nilai' => $nilai,
            ]);
        }
    }

    /**
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
     public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $fotoD = $model->foto;
        if ($model->load(Yii::$app->request->post())) {
            
            $tgllahir = strtotime($_POST['Siswa']['thn'].'-'.$_POST['Siswa']['bln'].'-'.$_POST['Siswa']['tgl']);
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
                    $foto->saveAs('uploads/foto_siswa/'. $model->foto);
                    chmod('uploads/foto_siswa/'. $model->foto, 777);
                }
                $user = \common\models\User::find()
                                ->where('email=:email', [':email' => $model->email])
                                ->one();
                if(!empty($user)){
                    $user->password = $model->password;
                    $user->username = $model->nis;
                    $user->email = $model->email;
                    $user->save();                    
                }


                Yii::$app->session->setFlash('success', 'Simpan Berhasil');                
                return $this->redirect(['view', 'id' => $model->nis]);
            }
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Siswa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $foto = $model->foto;
        if($model->delete()){
            if($foto){
                chmod('uploads/foto_siswa/'. $foto, 777);
                unlink('uploads/foto_siswa/'.$foto);        
            }
            
        }        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Siswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Siswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Siswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
