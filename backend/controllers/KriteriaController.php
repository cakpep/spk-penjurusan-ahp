<?php

namespace backend\controllers;

use Yii;
use app\models\Kriteria;
use app\models\KriteriaPrioritas;
use app\models\KriteriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * KriteriaController implements the CRUD actions for Kriteria model.
 */
class KriteriaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                    
                    [
                        'actions' => ['index', 'create', 'update','delete','view','metode','metode-hitung','metode-simpan'],
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
     * Lists all Kriteria models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KriteriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMetodeSimpan($ktg='prioritas')
    {
        $data = Yii::$app->request->post();
        
        if($_GET['methode']=='prioritas'){
            $prioritasMinat = KriteriaPrioritas::findOne(1); // mencari id yang sama dengan 1 di tabel kriteria prioritas 
            $prioritasMinat->minat = $data['KriteriaPrioritas']['nilaiMinat'];
            $prioritasMinat->psikotes = $data['KriteriaPrioritas']['nilaiPsikotes'];            
            $prioritasMinat->save(); //menyimpan update data
            
            $prioritasPsikotes = KriteriaPrioritas::findOne(2);
            $prioritasPsikotes->psikotes = $data['KriteriaPrioritas']['minatPsikotes'];
            $prioritasPsikotes->save();
            //untuk beralih ke halaman /action metode dg kategori prioritas
            return $this->redirect(['metode', 'ktg' => 'prioritas']);                
        }
        if($_GET['methode']=='nilai'){
            $prioritasMinat = KriteriaPrioritas::findOne(4);
            $prioritasMinat->minat = $data['KriteriaPrioritas']['nilaiMinat'];
            $prioritasMinat->psikotes = $data['KriteriaPrioritas']['nilaiPsikotes'];            
            $prioritasMinat->save();
            
            $prioritasPsikotes = KriteriaPrioritas::findOne(9);
            $prioritasPsikotes->psikotes = $data['KriteriaPrioritas']['minatPsikotes'];
            $prioritasPsikotes->save();
            return $this->redirect(['metode', 'ktg' => 'nilai']);                
        }
        if($_GET['methode']=='minat'){
            $prioritasMinat = KriteriaPrioritas::findOne(12);
            $prioritasMinat->minat = $data['KriteriaPrioritas']['nilaiMinat'];
            $prioritasMinat->psikotes = $data['KriteriaPrioritas']['nilaiPsikotes'];            
            $prioritasMinat->save();
            
            $prioritasPsikotes = KriteriaPrioritas::findOne(13);
            $prioritasPsikotes->psikotes = $data['KriteriaPrioritas']['minatPsikotes'];
            $prioritasPsikotes->save();
            return $this->redirect(['metode', 'ktg' => 'minat']);                
        }
        if($_GET['methode']=='psikotes'){
            $prioritasMinat = KriteriaPrioritas::findOne(15);
            $prioritasMinat->minat = $data['KriteriaPrioritas']['nilaiMinat'];
            $prioritasMinat->psikotes = $data['KriteriaPrioritas']['nilaiPsikotes'];            
            $prioritasMinat->save();
            
            $prioritasPsikotes = KriteriaPrioritas::findOne(16);
            $prioritasPsikotes->psikotes = $data['KriteriaPrioritas']['minatPsikotes'];
            $prioritasPsikotes->save();
            return $this->redirect(['metode', 'ktg' => 'psikotes']);                
        }
        
    }
    
    public function actionMetode($ktg='prioritas')
    {   
        $kriteriaModel = new KriteriaPrioritas();
        $kriteria = KriteriaPrioritas::find()->where("kategori='$ktg' ")->all();
        $data =array();
        
        foreach ($kriteria as $key => $value) {
            if( $value->kriteria=='IPA' || $value->kriteria=='nilai'){
                $kk = 'nilai';
            }

            if( $value->kriteria=='IPS' || $value->kriteria=='minat'){
                $kk = 'minat';
            }

            if( $value->kriteria=='BAHASA' || $value->kriteria=='psikotes'){
                $kk = 'psikotes';
            }

            $data[$kk]= array(
                            'nilai'=>  intval($value->nilai),
                            'minat'=> intval($value->minat),
                            'psikotes'=> intval($value->psikotes),
                        );
            
        }
        
        //fungsi untuk kalkulasi hitungan Nilai Kriteria Prioritas
        $kriteriaPrioritas = $this->hitungNilaiKriteriaPrioritas($data);
        
        //fungsi untuk kalkulasi hitungan Nilai Matriks Kriteria Prioritas
        $matriksNilaiKriteria = $this->hitungMatriksNilaiKriteria($kriteriaPrioritas,$ktg);
        
        $matriksNilaiKriteriaPenjumlahan = $this->hitungMatriksPenjumlahanSetiapBaris($kriteriaPrioritas,$matriksNilaiKriteria);
        
        return $this->render($ktg,[
                                        'data' => $kriteriaPrioritas,
                                        'matriksNilaiKriteria' => $matriksNilaiKriteria,
                                        'matriksNilaiKriteriaPenjumlahan' => $matriksNilaiKriteriaPenjumlahan,
                                        'kriteriaModel' => $kriteriaModel
                                    ]);
    }
    
    
      
    
    public function hitungNilaiKriteriaPrioritas($data){
        $dataHitung = array
                    (
                        'nilai' => array(
                                        'nilai' => $data['nilai']['nilai'],
                                        'minat' => $data['nilai']['minat'],
                                        'psikotes' => $data['nilai']['psikotes'],
                        ),
                        'minat'=> array(
                                'nilai' => number_format($data['nilai']['nilai']/$data['nilai']['minat'],2),
                                'minat' => $data['minat']['minat'],
                                'psikotes'=> $data['minat']['psikotes'],
                        ),
                        'psikotes' => array(
                                'nilai' => number_format($data['nilai']['nilai']/$data['nilai']['psikotes'],2),
                                'minat' => number_format($data['minat']['minat']/$data['minat']['psikotes'],2),
                                'psikotes' => $data['psikotes']['psikotes'],
                        ),
                        'jumlah' => array(
                                'nilai' => number_format($data['nilai']['nilai']+ ($data['nilai']['nilai']/$data['nilai']['minat']) + ($data['nilai']['nilai']/$data['nilai']['psikotes']),2),
                                'minat' => number_format($data['nilai']['minat'] +  $data['minat']['minat'] + $data['minat']['minat']/$data['minat']['psikotes'],2),
                                'psikotes' => number_format($data['nilai']['psikotes'] + $data['minat']['psikotes'] + $data['psikotes']['psikotes'],2),
                        )
                    );
        
        return $dataHitung;
        
    }
    
    public function hitungMatriksNilaiKriteria($data,$ktg){
        $dataHitung = array
                    (
                        'nilai' => array(
                                'nilai' => number_format(($data['nilai']['nilai']/$data['jumlah']['nilai']),2),
                                'minat' => number_format(($data['nilai']['minat']/$data['jumlah']['minat']),2),
                                'psikotes' => number_format(($data['nilai']['psikotes']/$data['jumlah']['psikotes']),2),
                                
                        ),
                        'minat'=> array(
                                'nilai' => number_format(($data['minat']['nilai']/$data['jumlah']['nilai']),2),
                                'minat' => number_format(($data['minat']['minat']/$data['jumlah']['minat']),2),
                                'psikotes' => number_format(($data['minat']['psikotes']/$data['jumlah']['psikotes']),2),
                                
                        ),
                        'psikotes' => array(
                                'nilai' => number_format(($data['psikotes']['nilai']/$data['jumlah']['nilai']),2),
                                'minat' =>number_format( $data['psikotes']['minat']/$data['jumlah']['minat'],2),
                                'psikotes' => number_format(($data['psikotes']['psikotes']/$data['jumlah']['psikotes']),2),
                                
                        ),
                        'jumlah' => array(
                                'nilai' => number_format(($data['nilai']['nilai']/$data['jumlah']['nilai']) +
                                            ($data['nilai']['minat']/$data['jumlah']['minat'])+
                                            ($data['nilai']['psikotes']/$data['jumlah']['psikotes']),2),
                                'minat' => number_format(($data['minat']['nilai']/$data['jumlah']['nilai']) +
                                                    ($data['minat']['minat']/$data['jumlah']['minat'])+
                                                    ($data['minat']['psikotes']/$data['jumlah']['psikotes']),2),
                                'psikotes' =>  number_format(($data['psikotes']['nilai']/$data['jumlah']['nilai']) +
                                                    ($data['psikotes']['minat']/$data['jumlah']['minat'])+
                                                    ($data['psikotes']['psikotes']/$data['jumlah']['psikotes']),2),
                        ),
                        
                    );
        $prioritas = array(
                    'prioritas' => array(
                                'nilai' => number_format($dataHitung['jumlah']['nilai']/3,2),
                                'minat' => number_format($dataHitung['jumlah']['minat']/3,2),
                                'psikotes'=> number_format($dataHitung['jumlah']['psikotes']/3,2),                                
                        ),            
        );
        
        $connection = \Yii::$app->db;
        
        if($ktg!=='prioritas'){            
            $prioritas_sub_nilai = 0;
            
            foreach($prioritas['prioritas'] as $key => $val){
                //number_format merubah format nilai decimal menjadi 2 angka di belakakng koma misal 0,21300 = 0,21
                if($key=='nilai'){ //dianggap IPA
                    $jurid=101;
                    $prioritas_sub_nilai = number_format($prioritas['prioritas']['nilai']/max($prioritas['prioritas']),2);
                }

                if($key=='minat'){//dianggap IPS
                    $jurid=102;
                    $prioritas_sub_nilai = number_format($prioritas['prioritas']['minat']/max($prioritas['prioritas']),2);
                }

                if($key=='psikotes'){ //dianggap BAHASA
                    $jurid=103; //kode id Mapel BHS
                    $prioritas_sub_nilai = number_format($prioritas['prioritas']['psikotes']/max($prioritas['prioritas']),2);
                }
                // otomatis update ke tabel kriteria
                $connection->createCommand()
                            ->update('kriteria', ['bobot' => $val,'prioritas_sub'=>$prioritas_sub_nilai], "prioritas='$ktg' and id_jurusan=$jurid")
                            ->execute();
            }
            
        }else{

            //otomatis update table prioritas 
            foreach($prioritas['prioritas'] as $key => $val){
                    $connection->createCommand()
                                ->update('prioritas', ['bobot' => $val], "kode='$key'")
                                ->execute();
            }
        }


        $dataHitung = array_merge($dataHitung,$prioritas);
        
        return $dataHitung;
        
        
    }
    
    
    public function hitungMatriksPenjumlahanSetiapBaris($matriksPerbandingan,$matriksNilaiKriteria){
        
        $dataHitung = array
                    (
                        'nilai' => array(
                                'nilai' => ($matriksPerbandingan['nilai']['nilai']*$matriksNilaiKriteria['prioritas']['nilai']),
                                'minat' => ($matriksPerbandingan['nilai']['minat']*$matriksNilaiKriteria['prioritas']['minat']),
                                'psikotes' => ($matriksPerbandingan['nilai']['psikotes']*$matriksNilaiKriteria['prioritas']['psikotes']),
                                
                        ),
                        'minat'=> array(
                                'nilai' => ($matriksPerbandingan['minat']['nilai']*$matriksNilaiKriteria['prioritas']['nilai']),
                                'minat' => ($matriksPerbandingan['minat']['minat']*$matriksNilaiKriteria['prioritas']['minat']),
                                'psikotes' => ($matriksPerbandingan['minat']['psikotes']*$matriksNilaiKriteria['prioritas']['psikotes']),
                                
                        ),
                        'psikotes' => array(
                                'nilai' => number_format($matriksPerbandingan['psikotes']['nilai']*$matriksNilaiKriteria['prioritas']['nilai'],2),
                                'minat' => ($matriksPerbandingan['psikotes']['minat']*$matriksNilaiKriteria['prioritas']['minat']),
                                'psikotes' => ($matriksPerbandingan['psikotes']['psikotes']*$matriksNilaiKriteria['prioritas']['psikotes']),
                                
                        ),
                        
                        
                    );
        
        $total = array(
                    'jumlah' => array(
                                'nilai' => number_format($dataHitung['nilai']['nilai']+$dataHitung['nilai']['minat']+$dataHitung['nilai']['psikotes'],2),
                                'minat' => number_format($dataHitung['minat']['nilai']+$dataHitung['minat']['minat']+$dataHitung['minat']['psikotes'],2),
                                'psikotes' => number_format($dataHitung['psikotes']['nilai']+$dataHitung['psikotes']['minat']+$dataHitung['psikotes']['psikotes'],2),
                        ),           
        );
        $prioritas = array_merge($total,['prioritas'=>$matriksNilaiKriteria['prioritas']]);
        
        $hasil = array(
                    'hasil' => array(
                                'nilai' => number_format($total['jumlah']['nilai']+$prioritas['prioritas']['nilai'],2),
                                'minat' => number_format($total['jumlah']['minat']+$prioritas['prioritas']['minat'],2),
                                'psikotes' => number_format($total['jumlah']['psikotes']+$prioritas['prioritas']['psikotes'],2),
                        ),           
        );
        
        $total = array_merge($prioritas,$hasil);
        
        $dataHitung = array_merge($dataHitung,$total);
        
        return $dataHitung;
        
    }

    public function actionMetodeHitung()
    {   
        
	$kriteria = KriteriaPrioritas::find()->all();
         echo "<pre>";
//        print_r($kriteria);
//        die();
        $data =array();
        foreach ($kriteria as $key => $value) {
            $kk = $value->kriteria;//+"-"+$key;
            $data[$kk]= array(
                            'nilai'=>  intval($value->nilai),
                            'minat'=> intval($value->minat),
                            'psikotes'=> intval($value->psikotes),
                        );
            
        }
        echo "<pre>";
//        print_r($data);
        
        echo '<hr>';
        $dataHitung = $this->hitungNilaiKriteriaPrioritas($data);
        
        echo "<pre>";
        print_r($dataHitung);
        $matriksNilaiKriteria = $this->hitungMatriksNilaiKriteria($dataHitung);
        echo '<hr>';
        echo "<pre>";
        print_r($matriksNilaiKriteria);
        
        $matriksNilaiKriteriaPenjumlahan = $this->hitungMatriksPenjumlahanSetiapBaris($dataHitung,$matriksNilaiKriteria);
        echo '<hr>';
        echo "<pre>";
        print_r($matriksNilaiKriteriaPenjumlahan);
        
        
//        echo json_encode($kriteria,JSON_PRETTY_PRINT);
//        echo ;
        
    }

    /**
     * Displays a single Kriteria model.
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
     * Creates a new Kriteria model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Kriteria();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kriteria]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Kriteria model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kriteria]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Kriteria model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kriteria model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Kriteria the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kriteria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
