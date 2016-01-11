<?php

namespace backend\controllers;

use Yii;
use app\models\NilaiPembobotanKriteria;
use app\models\NilaiPembobotanKriteriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HasilPembobotanController implements the CRUD actions for Nilai model.
 */
class HasilPembobotanController extends Controller
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
     * Lists all Nilai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NilaiPembobotanKriteriaSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->sqlLaporan();
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
