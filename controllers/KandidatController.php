<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Kandidat;
use app\models\TranJabatan;
use app\models\Pembayaran;
use app\models\MstBiaya;
use app\models\Konfigurasi;
use app\models\ReportTest;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\User;
use kartik\mpdf\Pdf;
use yii\helpers\ArrayHelper;

class KandidatController extends \yii\web\Controller
{
	
	public function actionIndex()
	{
		$kandidat = new Kandidat();
		
		return $this->render('kandidatbaru',['model' => $kandidat]);
	}

	public function beforeAction()
	{
		if (Yii::$app->user->isGuest)
			$this->redirect(['loginsite/index']);
		return true;
       //something code right here if user valided
	}
	
	public function actionSave()
	{
		$kandidat = new Kandidat();
		$auto = $this->autoNumber();
		$request = Yii::$app->request->post();
		$kandidat->kandidatid = $auto;
		$kandidat->date_add = date("Y-m-d");
		if ($kandidat->load($request) && $kandidat->save(false)) {

			//$session = Yii::$app->session;
			//$session->setFlash('berhasil', 'Data Anda Berhasil Disimpan');

			return $this->render('sukses',['model' => $auto]);
		} else {
            // either the page is initially displayed or there is some validation error
			return $this->render('error', ['model' => $kandidat->errors]);
		}
		
	}

	public function actionListAll()
	{
		$request = Yii::$app->request;
		$query = Kandidat::find()
		->andWhere(['flag_aktif' => 'Y'])
		->andWhere(['like', $request->post('kolom', 'kandidatid'), $request->post('nilai', '')]);
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$kandidat = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('listall', [
			'kandidat' => $kandidat,
			'pagination' => $pagination,
			]);
		
	}
	
	public function actionList()
	{
		$request = Yii::$app->request;
		$query = Kandidat::find()
		->where(['flag_interview' => 'N'])
		->andWhere(['flag_aktif' => 'Y'])
		->andWhere(['like', $request->post('kolom', 'kandidatid'), $request->post('nilai', '')]);
		/**
		if($request = Yii::$app->request->post()){
			$query = Kandidat::find()->where(['flag_interview' => 'N'])->andWhere(['like', $request['kolom'], $request['nilai']	]);
		}else{
			$query = Kandidat::find()->where(['flag_interview' => 'N']);
		}
		*/
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$kandidat = $query->orderBy('id')

		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('list', [
			'kandidat' => $kandidat,
			'pagination' => $pagination,
			]);
		
	}
	
	public function actionListBayar()
	{
		$request = Yii::$app->request;
		$query = Kandidat::find()
		->where(['flag_interview' => 'Y'])
		->andWhere(['flag_aktif' => 'Y'])
		->andWhere(['flag_member' => 'N'])
		->andWhere(['like', $request->post('kolom', 'kandidatid'), $request->post('nilai', '')]);
/**
		if($request = Yii::$app->request->post()){
			$query = Kandidat::find()->where(['flag_interview' => 'Y'])->andWhere(['like', $request['kolom'], $request['nilai']	]);
		}else{
			$query = Kandidat::find()->where(['flag_interview' => 'Y']);
		}
*/		
		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$kandidat = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();

		return $this->render('listpembayaran', [
			'kandidat' => $kandidat,
			'pagination' => $pagination,
			]);
		
	}
	
	
	
	public function actionInterview($id)
	{
		$kandidat = Kandidat::findOne($id);
		//$jabatan = new TranJabatan();
		return $this->render('interviewkandidat', ['model' => $kandidat]);
	}
	
	public function actionEdit($id)
	{
		#fungsi edit pd database kandidat
		$kandidat = Kandidat::findOne($id);
		
		$kandidat->jabatan = explode(',',$kandidat->jabatan);
		
		
		return $this->render('editkandidat', ['model' => $kandidat]);
	}

	public function actionBayar($id)
	{
		$kandidat = Kandidat::findOne($id);
		$bayar = new Pembayaran();
		$biaya = ArrayHelper::map(MstBiaya::find()->all(), 'id', 'jenis_bayar');
		$potongan = Konfigurasi::findOne(1);

		return $this->render('pembayaran', ['model' => $kandidat,'model2'=>$bayar,'model3'=>$biaya,'model4'=>$potongan]);
	}

	public function actionHistoryBayar($id)
	{
		$kandidat = Kandidat::findOne($id);
		$bayar = Pembayaran::find()->where(['kandidatid' => $id])->one();
		$tipebayar = MstBiaya::findOne($bayar->jenisbayar);


		return $this->render('historybayar', ['model' => $kandidat,'model2'=>$bayar,'model3'=>$tipebayar]);
	}
	/** bekas dipake jika jabatan dibuat table terpisah
	public function actionUpdate($id)
	{
		
		$model = $this->findModel($id);
		$model2 = new TranJabatan();
        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post())) {
			$file = UploadedFile::getInstance($model, 'fotokandidat');
			$model->fotokandidat = $file->name;
			$model2->kandidatid = $id;
			if($model->save() && $model2->save()){
				$file->saveAs('foto/' . $file->baseName . '.' . $file->extension);
				return $this->actionList();
			}else{
				return $this->render('interviewkandidat', [
                'model' => $model,'model2'=>$model2
				]);
			}
            
        } else {
            return $this->render('interviewkandidat', [
                'model' => $model,'model2'=>$model2
            ]);
        }
				
	}
	*/
	public function actionUpdate($id)
	{
		
		$model = $this->findModel($id);
		$data = Yii::$app->request->post();
		$jabatan = $data['Kandidat']['jabatan'];
		$jabatan = implode(',',$jabatan);
		
		
		if ($model->load($data) ) {

			$model->jabatan=$jabatan;
			$model->flag_interview='Y';		
			$file = UploadedFile::getInstance($model, 'fotokandidat');
			if(!empty($file)){
				
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$model->fotokandidat = $newname;	
				if($model->save() ){
					$file->saveAs('foto/' . $newname);
					return $this->redirect(['kandidat/list']);
				}else{
					return ;
				}
			}else{
				if($model->save() ){
					
					return $this->redirect(['kandidat/list']);
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
	
	public function actionUpdateAll($id)
	{
		
		$model = $this->findModel($id);
		$data = Yii::$app->request->post();
		$jabatan = $data['Kandidat']['jabatan'];
		$jabatan = implode(',',$jabatan);
		
		
		if ($model->load($data) ) {

			$model->jabatan=$jabatan;
			//$model->flag_interview='Y';		
			$file = UploadedFile::getInstance($model, 'fotokandidat');
			if(!empty($file)){
				
				$newname = Yii::$app->getSecurity()->generateRandomString(10).$file->baseName.'.'.$file->extension;
				$model->fotokandidat = $newname;	
				if($model->save() ){
					$file->saveAs('foto/' . $newname);
					return $this->redirect(['kandidat/list-all']);
				}else{
					return $this->redirect(['google.com']);;
				}
			}else{
				if($model->save(false) ){
					
					return $this->redirect(['kandidat/list-all']);
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

	public function actionSimpanbayar($id)
	{
		
		$model2 =  new Pembayaran();

		if ($model2->load(Yii::$app->request->post()) ) {
			
			$model2->kandidatid=$id;
			$model2->tglbayar=date("Y-m-d");
			$model = $this->findModel($id);
			$model->flag_member = 'Y';
			if($model2->save() && $model->save(false)){
				
				
				return $this->render('selamatbergabung',['model' => $id]);
				
			}else{
				return $this->render('listpembayaran', [
					'model' => $model
					]);
			}

		} else {
			return $this->render('interviewkandidat', [
				'model' => $model
				]);
		}

	}
	
	protected function findModel($id)
	{
		if (($model = Kandidat::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	protected function autoNumber()
	{
		$model = (new \yii\db\Query())
		->select(["(max(id)+1) as angka"])
		->from('kandidat')
		->orderBy(['id' => SORT_DESC])
		->one();

		$auto = "K".($model['angka'] == 0 ? '1' : $model['angka']);

		return $auto;
	}

	public function actionCetakFormInterview($id){
		$response = Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_RAW;
		$headers = Yii::$app->response->headers;
		$headers->add('Content-Type', 'application/pdf');
		// get your HTML raw content without any layouts or scripts
		$kandidat = Kandidat::findOne($id);
		//$jabatan = new TranJabatan();
		
		$content = $this->renderPartial('forminterview',['model' => $kandidat]);
		
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
			'options' => ['title' => 'Curriculum Vitae'],
         // call mPDF methods on the fly
			'methods' => [ 
			'SetHeader'=>['Curriculum Vitae'], 
			'SetFooter'=>['{PAGENO}'],
			]
			]);
		
    // return the pdf output as per the destination setting
		return $pdf->render(); 
	}

	public function actionPdf($id){

		$response = Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_RAW;
		$headers = Yii::$app->response->headers;
		$headers->add('Content-Type', 'application/pdf');
		// get your HTML raw content without any layouts or scripts
		$kandidat = Kandidat::findOne($id);
		//$jabatan = new TranJabatan();
		
		$content = $this->renderPartial('cv',['model' => $kandidat]);
		
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
			'options' => ['title' => 'Curriculum Vitae'],
         // call mPDF methods on the fly
			'methods' => [ 
			'SetHeader'=>['Curriculum Vitae'], 
			'SetFooter'=>['{PAGENO}'],
			]
			]);
		
    // return the pdf output as per the destination setting
		return $pdf->render(); 

	}

	public function actionTandaMember($id){

		//return $this->render('tandamember');

		$response = Yii::$app->response;
		$response->format = \yii\web\Response::FORMAT_RAW;
		$headers = Yii::$app->response->headers;
		$headers->add('Content-Type', 'application/pdf');
		// get your HTML raw content without any layouts or scripts
		$kandidat = Kandidat::findOne($id);
		//$jabatan = new TranJabatan();
		
		$content = $this->renderPartial('tandamember',['model' => $kandidat]);
		
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
			'options' => ['title' => 'Two Win Indonesia'],
         // call mPDF methods on the fly
			'methods' => [ 
			'SetHeader'=>['Two Win Indonesia'], 
			'SetFooter'=>['{PAGENO}'],
			]
			]);
		
    // return the pdf output as per the destination setting
		return $pdf->render(); 

	}


	public function actionListTest($id){
		$kandidat = Kandidat::findOne($id);
		$query = ReportTest::find()
		->where(['kandidatid' => $id])
		->andWhere(['flag_aktif' => 'Y']);		

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
			]);

		$test = $query->orderBy('id')
		->offset($pagination->offset)
		->limit($pagination->limit)
		->all();


		return $this->render('listtest', [
			'test' => $test,
			'kandidat' => $kandidat,
			'pagination' => $pagination,
			]);
	}

	public function actionNewTest($id){
		$test = new ReportTest();
		$kandidat = $this->findModel($id);
		return $this->render('newtest', ['model' => $kandidat, 'model2'=>$test]);
	}

	public function actionSimpanTest($id){
		$model2 =  new ReportTest();


		if ($model2->load(Yii::$app->request->post()) ) {
			
			
			$model2->kandidatid=$id;
			

			if($model2->save()){

				return $this->redirect(['kandidat/list-test','id' => $id]);
			}else{
				return ;
			}
			
			

		} else {
			return ;
		}
	}

	public function actionDisableTest($id){
		$model = $this->findModelTest($id);
		$model->flag_aktif = 'N';
		if($model->save(false)){
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			return $this->render('error', ['model' => $model->errors]);
		}
	}

	public function actionEditTest($id){
		$test = $this->findModelTest($id);
		$kandidat = $this->findModel($test->kandidatid);
		return $this->render('edittest', ['test' => $test,'kandidat'=>$kandidat]);
	}

	public function actionUpdateTest($id,$kandidatid){
		$model = $this->findModelTest($id);
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			
			return $this->redirect(['kandidat/list-test','id' => $kandidatid]);	
			

		} else {
			return ;
		}
	}

	protected function findModelTest($id)
	{
		if (($model = ReportTest::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}

	public function actionDisable($id){
		$model = $this->findModel($id);
		$model->flag_aktif = 'N';
		if($model->save(false)){
			return $this->redirect(Yii::$app->request->referrer);
		}else{
			return $this->render('error', ['model' => $model->errors]);
		}
		
	}

	public function actionTurunNonmember($id){
		$kandidat = Kandidat::findOne($id);
		
		return $this->render('turunnonmember', ['model' => $kandidat]);
	}

	public function actionUpdateNonmember($id){

		$model = Kandidat::findOne($id);
		$model->flag_member = 'N';
		$data = Yii::$app->request->post();

		
		if ($model->load($data) && $model->save()) {

			return $this->redirect(['kandidat/list-all']);
			
		}else{

		}


	}

	public function actionGetHarga(){

		if (Yii::$app->request->isAjax) {
			$data = Yii::$app->request->post();
        	//data: { 'save_id' : fileid },
			$mySaveId =  $data['id'];
        	// your logic;
			$harga = MstBiaya::findOne($mySaveId);
			echo $harga->biaya;
		}
	}



	public function actionCoba($id=18){
		$kandidat = Kandidat::findOne($id);
		//$jabatan = new TranJabatan();
		return $this->render('forminterview', ['model' => $kandidat]);
	}


}
