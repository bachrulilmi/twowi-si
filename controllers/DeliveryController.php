<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\Mitra;
use app\models\Delivery;
use app\models\Kandidat;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\User;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;

class DeliveryController extends \yii\web\Controller
{
	
	public function actionIndex()
	{
		$order = new Order();
		$mitra = ArrayHelper::map(Mitra::find()->all(), 'id', 'namamitra');
		
		return $this->render('neworder',['model' => $order, 'mitra'=>$mitra]);
	}

	public function beforeAction()
	{
		if (Yii::$app->user->isGuest)
			$this->redirect(['loginsite/index']);
		return true;
       //something code right here if user valided
	}

	public function actionListDeliv(){
		$request = Yii::$app->request;
		$query = Order::find()
		->With('mitra')
		->where(['status' => ['OPEN','IN PROGRESS']])
		->andWhere(['like', $request->post('kolom', 'status'), $request->post('nilai', '')]);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$order = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listdelivery', [
			'order' => $order,
			'pagination' => $pagination,
			]);
	}

	public function actionPilihKandidat($id)
	{
		$order = Order::find()->With('mitra')->where(['id' => $id])->one();
		$query = Delivery::find()
		->With('kandidat')
		->where(['orderid' => $id]);
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listkandidat', [
			'order' => $order,
			'count' => $query->count(),
			'delivery' => $delivery,
			'pagination' => $pagination,
			]);
	}

	public function actionNewKandidat($id){
		
		
		
		$request = Yii::$app->request;
		$query = Kandidat::find()
		->andWhere(['flag_aktif' => 'Y'])
		->andWhere(['flag_interview' => 'Y'])
		->andWhere(['like', $request->post('kolom', 'kandidatid'), $request->post('nilai', '')]);
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$kandidat = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('carikandidat', [
			'order' => $id,
			'kandidat' => $kandidat,
			'pagination' => $pagination,
			]);
	}

	public function actionChoose($kanid, $orderid)
	{
		$del = new Delivery();
		$del->orderid = $orderid;
		$del->kandidatid = $kanid;
		$del->status = 'AKTIF';

		$del->save();
		return $this->redirect(['delivery/pilih-kandidat','id'=>$orderid]);
	}


	public function actionListChecklist(){
		$request = Yii::$app->request;
		$query = Order::find()
		->With('mitra')
		->where(['status' => ['OPEN','IN PROGRESS']])
		->andWhere(['like', $request->post('kolom', 'status'), $request->post('nilai', '')]);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$order = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listchecklist', [
			'order' => $order,
			'pagination' => $pagination,
			]);
	}

	public function actionListCheckKandidat($id)
	{
		$order = Order::find()->With('mitra')->where(['id' => $id])->one();
		$query = Delivery::find()
		->With('kandidat')
		->where(['orderid' => $id]);
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listkancheck', [
			'order' => $order,
			'delivery' => $delivery,
			'pagination' => $pagination,
			]);
	}

	public function actionDoChecklist($id) 
	{
		$delivery = Delivery::find()->With('kandidat')->where(['id' => $id])->one();
		
		return $this->render('formchecklist', ['model' => $delivery]);
	}

	public function actionSimpanChecklist($id)
	{

		$model = Delivery::findOne($id);

		$data = Yii::$app->request->post();

		if ($model->load($data) ) {

			
			$filektp = UploadedFile::getInstance($model, 'ktp');
			$filelamaran = UploadedFile::getInstance($model, 'lamaran');
			$fileijazah = UploadedFile::getInstance($model, 'ijazah');
			$filetranskrip = UploadedFile::getInstance($model, 'transkrip');
			$filekartukel = UploadedFile::getInstance($model, 'kartukel');
			$filesuratkuning = UploadedFile::getInstance($model, 'suratkuning');
			$filepengalamankerja = UploadedFile::getInstance($model, 'pengalamankerja'); 

			if(!empty($filektp)){
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filektp->baseName.'.'.$filektp->extension;
				$model->ktp = $newname;
				$filektp->saveAs('checklist/' . $newname);
			}if (!empty($filelamaran)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filelamaran->baseName.'.'.$filelamaran->extension;
				$model->lamaran = $newname;
				$filelamaran->saveAs('checklist/' . $newname);
			}if (!empty($fileijazah)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$fileijazah->baseName.'.'.$fileijazah->extension;
				$model->ijazah = $newname;
				$fileijazah->saveAs('checklist/' . $newname);
			}if (!empty($filetranskrip)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filetranskrip->baseName.'.'.$filetranskrip->extension;
				$model->transkrip = $newname;
				$filetranskrip->saveAs('checklist/' . $newname);
			}if (!empty($filekartukel)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filekartukel->baseName.'.'.$filekartukel->extension;
				$model->kartukel = $newname;
				$filekartukel->saveAs('checklist/' . $newname);
			}if (!empty($filesuratkuning)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filesuratkuning->baseName.'.'.$filesuratkuning->extension;
				$model->suratkuning = $newname;
				$filesuratkuning->saveAs('checklist/' . $newname);
			}if (!empty($filepengalamankerja)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filepengalamankerja->baseName.'.'.$filepengalamankerja->extension;
				$model->pengalamankerja = $newname;
				$filepengalamankerja->saveAs('checklist/' . $newname);
			}

			if($model->save() ){

				return $this->redirect(['delivery/list-check-kandidat','id' => $model->orderid]);
			}else{
				return ;
			}			

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
		//return $this->render('error', ['model' => $data['Kandidat']['jabatan']]);		
	}

	public function actionListPembekalan(){
		$request = Yii::$app->request;
		$query = Order::find()
		->With('mitra')
		->where(['status' => ['OPEN','IN PROGRESS']])
		->andWhere(['like', $request->post('kolom', 'status'), $request->post('nilai', '')]);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$order = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listpembekalan', [
			'order' => $order,
			'pagination' => $pagination,
			]);
	}

	public function actionListBekalKandidat($id)
	{
		$order = Order::find()->With('mitra')->where(['id' => $id])->one();
		$query = Delivery::find()
		->With('kandidat')
		->where(['orderid' => $id]);
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listkanbekal', [
			'order' => $order,
			'delivery' => $delivery,
			'pagination' => $pagination,
			]);
	}

	public function actionDoBekal($id) 
	{
		$delivery = Delivery::find()->With('kandidat')->where(['id' => $id])->one();
		
		return $this->render('formpembekalan', ['model' => $delivery]);
	}

	public function actionSimpanPembekalan($id)
	{

		$model = Delivery::findOne($id);

		$data = Yii::$app->request->post();

		if ($model->load($data) ) {
			$model->flag_pembekalan = "Y";
			if($model->save() ){

				return $this->redirect(['delivery/list-bekal-kandidat','id' => $model->orderid]);
			}else{
				return ;
			}			

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
		//return $this->render('error', ['model' => $data['Kandidat']['jabatan']]);		
	}

	public function actionListTesting(){
		$request = Yii::$app->request;
		$query = Order::find()
		->With('mitra')
		->where(['status' => ['OPEN','IN PROGRESS']])
		->andWhere(['like', $request->post('kolom', 'status'), $request->post('nilai', '')]);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$order = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listtesting', [
			'order' => $order,
			'pagination' => $pagination,
			]);
	}

	public function actionListTestingKandidat($id)
	{
		$order = Order::find()->With('mitra')->where(['id' => $id])->one();
		$query = Delivery::find()
		->With('kandidat')
		->where(['orderid' => $id]);
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listkantest', [
			'order' => $order,
			'delivery' => $delivery,
			'pagination' => $pagination,
			]);
	}

	public function actionInputNilai($id) 
	{
		$delivery = Delivery::find()->With('kandidat')->where(['id' => $id])->one();
		
		return $this->render('forminputnilai', ['model' => $delivery]);
	}

	public function actionSimpanNilai($id)
	{

		$model = Delivery::findOne($id);

		$data = Yii::$app->request->post();

		if ($model->load($data) ) {
			$model->flag_test = "Y";
			if($model->save() ){

				return $this->redirect(['delivery/list-testing-kandidat','id' => $model->orderid]);
			}else{
				return ;
			}			

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
		//return $this->render('error', ['model' => $data['Kandidat']['jabatan']]);		
	}

}
