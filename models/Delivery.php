<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id
 * @property string $orderid
 * @property string $kandidatid
 * @property string $status
 * @property string $flag_checklist
 * @property string $ktp
 * @property string $lamaran
 * @property string $ijazah
 * @property string $transkrip
 * @property string $kartukel
 * @property string $suratkuning
 * @property string $pengalamankerja
 * @property string $flag_pembekalan
 * @property string $pembekalan_id
 * @property string $date_bekal
 * @property string $time_bekal
 * @property string $nama_bekal
 * @property string $trainer_bekal
 * @property string $keterangan
 * @property string $flag_test
 * @property integer $nilai_test
 * @property string $tgl_test
 * @property string $hasil_test
 * @property string $periode_kontrak
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['date_bekal', 'time_bekal', 'tgl_test'], 'safe'],
        [['nilai_test'], 'integer'],
        [['orderid', 'kandidatid', 'status', 'flag_checklist', 'flag_pembekalan', 'pembekalan_id', 'flag_test', 'hasil_test', 'periode_kontrak'], 'string', 'max' => 20],
        [['ktp', 'lamaran', 'ijazah', 'transkrip', 'kartukel', 'suratkuning', 'pengalamankerja', 'nama_bekal', 'trainer_bekal'], 'string', 'max' => 100],
        [['keterangan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'id' => 'ID',
        'orderid' => 'Orderid',
        'kandidatid' => 'Kandidatid',
        'status' => 'Status',
        'flag_checklist' => 'Flag Checklist',
        'ktp' => 'Ktp',
        'lamaran' => 'Lamaran',
        'ijazah' => 'Ijazah',
        'transkrip' => 'Transkrip',
        'kartukel' => 'Kartukel',
        'suratkuning' => 'Suratkuning',
        'pengalamankerja' => 'Pengalamankerja',
        'flag_pembekalan' => 'Flag Pembekalan',
        'pembekalan_id' => 'Pembekalan ID',
        'date_bekal' => 'Date Bekal',
        'time_bekal' => 'Time Bekal',
        'nama_bekal' => 'Nama Bekal',
        'trainer_bekal' => 'Trainer Bekal',
        'keterangan' => 'Keterangan',
        'flag_test' => 'Flag Test',
        'nilai_test' => 'Nilai Test',
        'tgl_test' => 'Tgl Test',
        'hasil_test' => 'Hasil Test',
        'periode_kontrak' => 'Periode Kontrak',
        ];
    }

    public function getKandidat(){  
      return $this->hasOne(Kandidat::className(), ['kandidatid' => 'kandidatid']);  
  }  

    public function getOrder(){
        return $this->hasOne(Order::className(), ['id' => 'orderid']);

  } 
       
}
