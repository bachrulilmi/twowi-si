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
			$filepengalamankerja = UploadedFile::getInstance($model, 'pengalamankerja'); #sampai sini
			if(!empty($file)){
				
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$model->lampiran = $newname;	
				if($model->save() ){
					$file->saveAs('orders/' . $newname);
					return $this->redirect(['order/list-order']);
				}else{
					return ;
				}
			}else{
				if($model->save() ){
					
					return $this->redirect(['order/list-order']);
				}else{
					return ;
				}
			}

			

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
		//return $this->render('error', ['model' => $data['Kandidat']['jabatan']]);		
	}

}
