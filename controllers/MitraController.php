<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Mitra;
use app\models\Kontrak;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\base\Security;

class MitraController extends \yii\web\Controller
{
	
	
	public function actionIndex()
	{

		$mitra = new Mitra();
		$request = Yii::$app->request;
		if ($mitra->load($request->post()) && $mitra->save()) {
            // valid data received in $model

            // do something meaningful here about $model ...
			
			return $this->actionList();
		} else {
            // either the page is initially displayed or there is some validation error
			return $this->render('mitrabaru', ['model' => $mitra]);
		}
	}

	public function beforeAction()
	{
		if (Yii::$app->user->isGuest)
			$this->redirect(['loginsite/index']);
		return true;
       //something code right here if user valided
	}
	/**
	public function actionSave()
	{
		$mitra = new Mitra();
		$request = Yii::$app->request;
		$mitra['lampiran']="test";
		if ($mitra->load($request->post()) && $mitra->save()) {
            // valid data received in $model

            // do something meaningful here about $model ...
			$mitra->lampiran = UploadedFile::getInstance($mitra, 'lampiran');
			if ($mitra->upload()) {
                // file is uploaded successfully
                return;
            }
			
			return $this->actionList();
        } else {
			$error = $mitra->errors;
            // either the page is initially displayed or there is some validation error
            return $this->render('error', ['model' => $error]);
        }
		
	}
	*/
	public function actionSave()
	{
		$mitra = new Mitra();
		$request = Yii::$app->request;
		
		if ($mitra->load($request->post()) && $mitra->save()) {


			return $this->redirect(['mitra/list']);			
			
		} else {
			$error = $mitra->errors;
            // either the page is initially displayed or there is some validation error
			return $this->render('error', ['model' => $error]);
		}
		
	}
	
	public function actionList()
	{
		$request = Yii::$app->request;
		$query = Mitra::find()
		->where(['status' => 'Aktif'])
		->andWhere(['like', $request->post('kolom', 'namamitra'), $request->post('nilai', '')]);

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$mitra = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('list', [
			'mitra' => $mitra,
			'pagination' => $pagination,
			]);
		//return $this->render('list', ['mitra' => $mitra]);
	}
	
	public function actionEditView($id)
	{
		$mitra = Mitra::findOne($id);
		return $this->render('mitraedit', ['model' => $mitra]);
	}
	
	public function actionUpdate($id)
	{
		
		$model = $this->findModel($id);
		
		if ($model->load(Yii::$app->request->post())) {
			$file = UploadedFile::getInstance($model, 'lampiran');
			if(!empty($file)){
				$model->lampiran = $file->name;
				if($model->save()){
					$file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
					return $this->redirect(['mitra/list']);
				}else{
					
					return;
				}
				
			}else{
				if($model->save()){
					return $this->redirect(['mitra/list']);
				}else{
					
					return;
				}
			}

		} else {
			return $this->render('update', [
				'model' => $model,
				]);
		}

	}

	public function actionContract($id){
		$mitra = Mitra::findOne($id);
		$query = Kontrak::find()
		->where(['status' => 'Aktif'])
		->andWhere(['mitraid' => $id]);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$kontrak = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listcontract', [
			'kontrak' => $kontrak,
			'mitra' => $mitra,
			'pagination' => $pagination,
			]);
	}

	public function actionNewContract($id){
		$kontrak = new Kontrak();
		$mitra = $this->findModel($id);
		return $this->render('kontrakbaru', ['model' => $mitra, 'model2'=>$kontrak]);
	}

	public function actionSimpanKontrak($id){
		$model2 =  new Kontrak();


		if ($model2->load(Yii::$app->request->post()) ) {
			
			$file = UploadedFile::getInstance($model2, 'lampiran');
			$model2->mitraid=$id;
			if(!empty($file)){
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$model2->lampiran = $newname;
				if($model2->save()){
					$file->saveAs('uploads/' . $newname);
					return $this->redirect(['mitra/contract','id' => $id]);
				}else{
					return ;
				}
			}else{
				if($model2->save()){
					
					return $this->redirect(['mitra/contract','id' => $id]);
				}else{
					return ;
				}
			}
			

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
	}

	public function actionEditKontrak($id){
		$kontrak = Kontrak::findOne($id);
		$mitra = $this->findModel($kontrak->mitraid);
		return $this->render('kontrakedit', ['kontrak' => $kontrak,'mitra'=>$mitra]);
	}

	public function actionUpdateKontrak($id,$mitraid){
		$model = $this->findModelKontrak($id);
		if ($model->load(Yii::$app->request->post())) {
			$file = UploadedFile::getInstance($model, 'lampiran');
			if(!empty($file)){
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$model->lampiran = $newname;
				if($model->save()){
					$file->saveAs('uploads/' . $newname);
					
					return $this->redirect(['mitra/contract','id' => $mitraid]);
				}else{
					
					return;
				}
				
			}else{
				if($model->save()){
					return $this->redirect(['mitra/contract','id' => $mitraid]);
				}else{
					
					return;
				}
			}

		} else {
			return $this->render('update', [
				'model' => $model,
				]);
		}
	}

	public function actionDisableKontrak($id){
		$model = $this->findModelKontrak($id);
		$model->status = 'Non Aktif';
		if($model->save(false)){
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			return $this->render('error', ['model' => $model->errors]);
		}
	}
	
	protected function findModel($id)
	{
		if (($model = Mitra::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function findModelKontrak($id)
	{
		if (($model = Kontrak::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
	
	public function actionUpload()
	{
		$model = new Mitra();

		if (Yii::$app->request->isPost) {
			$model->lampiran = UploadedFile::getInstance($model, 'lampiran');
			
			if ($model->upload()) {
                // file is uploaded successfully
				return $this->render('uploada', ['model' => $model]);
			}else{
				$errors = $model->errors;
				return $this->render('error', ['model' => $errors]);
			}
		}

		return $this->render('upload', ['model' => $model]);
	}

}
