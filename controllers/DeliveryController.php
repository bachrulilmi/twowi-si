<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Order;
use app\models\Mitra;
use app\models\Delivery;
use app\models\Kandidat;
use app\models\Pembekalan;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\User;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;
use yii\base\Security;

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
		->where(['orderid' => $id])
		->andWhere(['status' => 'AKTIF']);
		
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
		$sub = Delivery::find()->select('kandidatid')->where(['status'=>'AKTIF']);
		$query = Kandidat::find()
		//->where(['not in','kandidatid',$sub])
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

	public function actionDisableKandidat($id){
		$model = Delivery::findOne($id);
		$model->status = 'NON AKTIF';
		if($model->save(false)){
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			return $this->render('error', ['model' => $model->errors]);
		}
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
		->where(['orderid' => $id])
		->andWhere(['flag_checklist' => 'IN PROGRESS'])
		->andWhere(['status' => 'AKTIF']);
		$count = $query->count();
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
			'count' => $count,
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
			$fileskck = UploadedFile::getInstance($model, 'skck'); 
			$filekwitmember = UploadedFile::getInstance($model, 'kwit_member'); 

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
			}if (!empty($fileskck)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$fileskck->baseName.'.'.$fileskck->extension;
				$model->skck = $newname;
				$fileskck->saveAs('checklist/' . $newname);
			}if (!empty($filekwitmember)) {
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$filekwitmember->baseName.'.'.$filekwitmember->extension;
				$model->kwit_member = $newname;
				$filekwitmember->saveAs('checklist/' . $newname);
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
		->where(['orderid' => $id])
		->andWhere(['flag_pembekalan' => 'N'])
		->andWhere(['status' => 'AKTIF']);
		
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

	public function actionDoBekal() 
	{
		$delivery = new Pembekalan();
		
		return $this->render('form_pembekalan_baru', ['model' => $delivery]);
	}

	public function actionSimpanPembekalan()
	{

		$model = new Pembekalan();
		$model->id = Yii::$app->getSecurity()->generateRandomString(20);
		
		$data = Yii::$app->request->post();

		if ($model->load($data) ) {
			

			$bekal['date_bekal'] = $model->date_bekal;
			$bekal['time_bekal'] = $model->time_bekal;
			$bekal['nama_bekal'] = $model->nama_bekal;
			$bekal['trainer_bekal'] = $model->trainer_bekal;
			$bekal['keterangan'] = $model->keterangan;

			if($model->save()){
				return $this->redirect(['delivery/list-kandidat-pembekalan','id' => $model->id,'databekal'=>$bekal]);	
			}
			else{
				return;
			}

			

			//return $this->redirect(['delivery/list-bekal-kandidat','id' => $model->orderid]);
						

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
		//return $this->render('error', ['model' => $data['Kandidat']['jabatan']]);		
	}

	public function actionListKandidatPembekalan($id, array $databekal){
		
		$query = Delivery::find()
		->With('kandidat')
		->where(['pembekalan_id' => $id])
		->andWhere(['flag_pembekalan' => 'Y'])
		->andWhere(['status' => 'AKTIF']);
		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listkanbekal', [
			'bekal' => $databekal,
			'id' => $id,
			'delivery' => $delivery,
			'pagination' => $pagination,
			]);
	}

	public function actionPilihKandidatBekal($id,array $databekal){ 
		
		$request = Yii::$app->request;
		$query = Delivery::find()
		->with('kandidat')
		->with('order')
		->andWhere(['status' => 'AKTIF'])
		->andWhere(['flag_pembekalan' => 'N'])
		->andWhere(['like', $request->post('kolom', 'kandidatid'), $request->post('nilai', '')]);

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$delivery = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('pilih_kandidat_bekal', [
			'delivery' => $delivery,
			'id' => $id,
			'bekal' => $databekal,
			'pagination' => $pagination,
			]);

	}

	public function actionSimpanKandidatBekal($kandid , array $databekal, $id){
			
		$modeldelivery = Delivery::find()->where(['id' => $databekal['delivid']])
		->andWhere(['kandidatid' => $kandid])->one();
		$modeldelivery->flag_pembekalan = 'Y';
		$modeldelivery->pembekalan_id = $id;
		if($modeldelivery->save()){

			return $this->redirect(['delivery/list-kandidat-pembekalan','id' => $id,'databekal'=>$databekal]);
		} 
		else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}
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
		->where(['orderid' => $id])
		->andWhere(['status' => 'Aktif']);
		
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

	public function actionInputNilai($id,$order) 
	{
		$delivery = Delivery::find()->With('kandidat')->where(['id' => $id])->one();
		
		return $this->render('forminputnilai', ['model' => $delivery,'order'=>$order]);
	}

	public function actionSimpanNilai($id)
	{

		$model = Delivery::findOne($id);

		$data = Yii::$app->request->post();

		if ($model->load($data) ) {
			$model->flag_test = "Y";
			if($model->save() ){
				$this->checkstatus($model->orderid);
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

	public function checkstatus($id){
		$jmlorder = Order::find()->where(['id'=>$id])->count();
		$jmldeliv = Delivery::find()->where(['orderid'=>$id])->andWhere(['status'=>'AKTIF'])->andWhere(['hasil_test'=>'Lulus'])->count();

		if($jmlorder == $jmldeliv){
			$order = Order::findOne($id);
			$order->status="COMPLETED";
			$order->save();
		}

	}

	public function actionPrintPengantar($id){
		$response = Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_RAW;
		$headers = Yii::$app->response->headers;
		$headers->add('Content-Type', 'application/pdf');
		// get your HTML raw content without any layouts or scripts
		$kandidat = Kandidat::find()->where(['kandidatid' => $id])->one();
		
		$content = $this->renderPartial('suratpengantartest',['model' => $kandidat]);
		
    // setup kartik\mpdf\Pdf component
		$pdf = new Pdf([
        // set to use core fonts only
			'mode' => Pdf::MODE_CORE, 
        // A4 paper format
			'format' => Pdf::FORMAT_A4, 
        // portrait orientation
			'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
			'destination' => Pdf::DEST_BROWSER, 
        // your html content input
			'content' => $content,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
			'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
			'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
			'options' => ['title' => 'Surat Pengantar'],
         // call mPDF methods on the fly
			'methods' => [ 
			'SetHeader'=>['Surat Pengantar'], 
			'SetFooter'=>['{PAGENO}'],
			]
			]);
		
    // return the pdf output as per the destination setting
		return $pdf->render(); 
	}

	public function actionBuatPembekalan(){

		$delivery = Delivery::find()->With('kandidat')->where(['id' => $id])->one();
		
		return $this->render('formpembekalan', ['model' => $delivery]);

	}

	public function actionListPembekalan2(){
			
		$query = Pembekalan::find()->where(['not',['date_bekal'=>null]]);	

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$order = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listpembekalan2', [
			'order' => $order,
			'pagination' => $pagination,
			]);
	}

	public function actionViewListBekal2($id){
		$bekal = Pembekalan::find()->where(['id' => $id])->one();
		
		$databekal['date_bekal'] = $bekal->date_bekal;
		$databekal['time_bekal'] = $bekal->time_bekal;
		$databekal['nama_bekal'] = $bekal->nama_bekal;
		$databekal['trainer_bekal'] = $bekal->trainer_bekal;
		$databekal['keterangan'] = $bekal->keterangan;

		return $this->redirect(['delivery/list-kandidat-pembekalan','id'=>$id,'databekal'=>$databekal]);
	}

}
