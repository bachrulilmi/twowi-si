<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\Mitra;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\User;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;

class OrderController extends \yii\web\Controller
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
	public function actionSimpan()
	{
		$order = new Order();
		$request = Yii::$app->request->post();
		$bpjs = $request['Order']['bpjs'];
		$bpjs = implode(',',$bpjs);
		$file = UploadedFile::getInstance($order, 'lampiran');
		if($order->load($request))
		{
			$order->bpjs=$bpjs;
			$order->status='OPEN';
			if(!empty($file)) //jika user upload file
			{
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$order->lampiran = $newname;
				if ( $order->save()) {
					$file->saveAs('orders/' . $newname);
					return $this->redirect(['order/list-order']);
				} else {
            // either the page is initially displayed or there is some validation error
					return $this->render('error', ['model' => $order->errors]);
				}
		}else{ // jika user tidak upload file
			if ($order->save()) {
				
				return $this->redirect(['order/list-order']);
			} else {
            // either the page is initially displayed or there is some validation error
				return $this->render('error', ['model' => $order->errors]);
			}
		}
	}else{

	}



}

public function actionListOrder(){
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


	return $this->render('listorder', [
		'order' => $order,
		'pagination' => $pagination,
		]);
}

public function actionEdit($id)
{
	$order = Order::findOne($id);
	$order->bpjs = explode(',',$order->bpjs);
	$mitra = ArrayHelper::map(Mitra::find()->all(), 'id', 'namamitra');
	return $this->render('orderedit', ['model' => $order,'mitra'=>$mitra]);
}

public function actionUpdate($id)
{

	$model = Order::findOne($id);

	$data = Yii::$app->request->post();
	$bpjs = $data['Order']['bpjs'];
	$bpjs = implode(',',$bpjs);


	if ($model->load($data) ) {

			$model->bpjs=$bpjs; ////baru sampai sini

			$file = UploadedFile::getInstance($model, 'lampiran');
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

	public function actionDisable($id){
		$model = Order::findOne($id);
		$model->status = 'DISABLE';
		if($model->save(false)){
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			return $this->render('error', ['model' => $model->errors]);
		}
		
	}


}
