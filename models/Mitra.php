<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mitra".
 *
 * @property integer $id
 * @property string $mitraid
 * @property string $namamitra
 * @property string $alamatmitra
 * @property string $namapic
 * @property string $jabatanpic
 * @property string $telppic
 * @property string $emailpic
 * @property string $deskripsi
 * @property string $namapictwi
 * @property string $emailpictwi
 * @property string $status
 * @property string $lampiran
 * @property string $lampiran2
 * @property string $lampiran3
 * @property string $lampiran4
 * @property string $lampiran5
 */
class Mitra extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mitra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['mitraid', 'jabatanpic'], 'required'],
            [['mitraid', 'status'], 'string', 'max' => 10],
            [['namamitra', 'emailpic', 'namapictwi', 'emailpictwi'], 'string', 'max' => 50],
            [['alamatmitra', 'deskripsi', 'lampiran', 'lampiran2', 'lampiran3', 'lampiran4', 'lampiran5'], 'string', 'max' => 255],
            [['namapic'], 'string', 'max' => 100],
            [['jabatanpic'], 'string', 'max' => 20],
            [['telppic'], 'string', 'max' => 25],
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
            'namamitra' => 'Namamitra',
            'alamatmitra' => 'Alamatmitra',
            'namapic' => 'Namapic',
            'jabatanpic' => 'Jabatanpic',
            'telppic' => 'Telppic',
            'emailpic' => 'Emailpic',
            'deskripsi' => 'Deskripsi',
            'namapictwi' => 'Namapictwi',
            'emailpictwi' => 'Emailpictwi',
            'status' => 'Status',
            'lampiran' => 'Lampiran',
            'lampiran2' => 'Lampiran2',
            'lampiran3' => 'Lampiran3',
            'lampiran4' => 'Lampiran4',
            'lampiran5' => 'Lampiran5',
        ];
    }

    public function getOrder()
    {
        return $this->hasMany(Order::className(), ['mitraid' => 'id']);
    }
}
