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
 * @property string $tgl_mulai
 * @property string $tgl_selesai
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
            [['tgl_mulai', 'tgl_selesai'], 'safe'],
            [['lampiran', 'penjelasan'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 20],
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
            'tgl_mulai' => 'Tgl Mulai',
            'tgl_selesai' => 'Tgl Selesai',
            'status' => 'Status',
            'nilai' => 'Nilai',
            'nokontrak' => 'Nokontrak',
            'ttd' => 'Ttd',
        ];
    }
}
