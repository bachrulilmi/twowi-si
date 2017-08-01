<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $mitraid
 * @property string $namapictwo
 * @property string $kategori
 * @property string $posisi
 * @property integer $qty
 * @property string $spesifikasi
 * @property string $duedate
 * @property string $periode
 * @property string $sat_periode
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string $nilai_kontrak
 * @property string $bpjs
 * @property string $gaji
 * @property string $thr
 * @property string $lampiran
 * @property string $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mitraid', 'duedate'], 'required'],
            [['mitraid', 'qty'], 'integer'],
            [['duedate', 'tgl_mulai', 'tgl_selesai'], 'safe'],
            [['namapictwo'], 'string', 'max' => 50],
            [['kategori', 'posisi', 'periode', 'sat_periode', 'nilai_kontrak', 'gaji', 'thr', 'status'], 'string', 'max' => 20],
            [['spesifikasi', 'bpjs', 'lampiran'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mitraid' => 'Mitraid',
            'namapictwo' => 'Namapictwo',
            'kategori' => 'Kategori',
            'posisi' => 'Posisi',
            'qty' => 'Qty',
            'spesifikasi' => 'Spesifikasi',
            'duedate' => 'Duedate',
            'periode' => 'Periode',
            'sat_periode' => 'Sat Periode',
            'tgl_mulai' => 'Tgl Mulai',
            'tgl_selesai' => 'Tgl Selesai',
            'nilai_kontrak' => 'Nilai Kontrak',
            'bpjs' => 'Bpjs',
            'gaji' => 'Gaji',
            'thr' => 'Thr',
            'lampiran' => 'Lampiran',
            'status' => 'Status',
        ];
    }


       public function getMitra() 
           { 
               return $this->hasOne(Mitra::className(), ['id' => 'mitraid']); 
           } 
         
           public function getDelivery(){ 
               return $this->hasMany(Delivery::className(), ['orderid' => 'id']); 
           } 
        
}
