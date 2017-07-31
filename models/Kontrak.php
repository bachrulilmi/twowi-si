<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kontrak".
 *
 * @property integer $id
 * @property integer $mitraid
 * @property string $lampiran
 * @property string $penjelasan
 * @property string $tahun_mulai
 * @property string $tahun_selesai
 * @property string $status
 * @property integer $nilai
 * @property string $nokontrak
 * @property string $ttd
 */
class Kontrak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kontrak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mitraid'], 'required'],
            [['mitraid', 'nilai'], 'integer'],
            [['lampiran', 'penjelasan'], 'string', 'max' => 100],
            [['tahun_mulai', 'tahun_selesai', 'status'], 'string', 'max' => 20],
            [['nokontrak', 'ttd'], 'string', 'max' => 50],
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
            'lampiran' => 'Lampiran',
            'penjelasan' => 'Penjelasan',
            'tahun_mulai' => 'Tahun Mulai',
            'tahun_selesai' => 'Tahun Selesai',
            'status' => 'Status',
            'nilai' => 'Nilai',
            'nokontrak' => 'Nokontrak',
            'ttd' => 'Ttd',
        ];
    }
}
