<?php

namespace backend\controllers;

use app\models\MatapelajaranGuru;
use app\models\MatapelajaranGuruSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * MatapelajaranGuruController implements the CRUD actions for MatapelajaranGuru model.
 */
class MatapelajaranGuruController extends Controller {
	public function behaviors() {
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
	 * Lists all MatapelajaranGuru models.
	 * @return mixed
	 */
	public function actionIndex() {
		$model = new MatapelajaranGuru();
		$searchModel = new MatapelajaranGuruSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'model' => $model,
		]);
	}

	/**
	 * Displays a single MatapelajaranGuru model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new MatapelajaranGuru model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new MatapelajaranGuru();

		if ($model->load(Yii::$app->request->post())) {

			$subkls = $_POST['MatapelajaranGuru']['subkls'];

			foreach ($subkls as $key => $value) {
				if ($value == 'A') {
					$model->sub_kls1 = 'A';
				}
				if ($value == 'B') {
					$model->sub_kls2 = 'B';
				}
				if ($value == 'C') {
					$model->sub_kls3 = 'C';
				}
				if ($value == 'D') {
					$model->sub_kls4 = 'D';
				}
				if ($value == 'E') {
					$model->sub_kls5 = 'E';
				}
				// if($value=='F'){
				//     $model->sub_kls6 = 'F';
				// }

			}

			if ($model->save()) {
				Yii::$app->session->setFlash('success', 'Simpan Berhasil');
			} else {
				Yii::$app->session->setFlash('failed', 'Simpan Gagal');
			}

			return $this->redirect(['index']);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing MatapelajaranGuru model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post())) {
			$subkls = $_POST['MatapelajaranGuru']['subkls'];

			// print_r($_POST);die();
			foreach ($subkls as $key => $value) {
				if ($value == 'A') {
					$model->sub_kls1 = 'A';
				}
				if ($value == 'B') {
					$model->sub_kls2 = 'B';
				}
				if ($value == 'C') {
					$model->sub_kls3 = 'C';
				}
				if ($value == 'D') {
					$model->sub_kls4 = 'D';
				}
				if ($value == 'E') {
					$model->sub_kls5 = 'E';
				}
			}
			$model->save();
			return $this->redirect(['view', 'id' => $model->id_matapelajaran_guru]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing MatapelajaranGuru model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the MatapelajaranGuru model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return MatapelajaranGuru the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id) {
		if (($model = MatapelajaranGuru::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
