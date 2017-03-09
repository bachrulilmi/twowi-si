<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembekalan".
 *
 * @property integer $id
 * @property integer $delivery_id
 * @property string $date_bekal
 * @property string $time_bekal
 * @property string $nama_bekal
 * @property string $trainer_bekal
 * @property string $keterangan
 */
class Pembekalan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembekalan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_id'], 'required'],
            [['delivery_id'], 'integer'],
            [['date_bekal', 'time_bekal'], 'safe'],
            [['nama_bekal', 'trainer_bekal'], 'string', 'max' => 100],
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
            'delivery_id' => 'Delivery ID',
            'date_bekal' => 'Date Bekal',
            'time_bekal' => 'Time Bekal',
            'nama_bekal' => 'Nama Bekal',
            'trainer_bekal' => 'Trainer Bekal',
            'keterangan' => 'Keterangan',
        ];
    }
}
