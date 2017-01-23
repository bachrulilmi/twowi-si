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
 * @property string $tahun
 * @property string $status
 * @property string $periode
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
            [['mitraid'], 'integer'],
            [['lampiran', 'penjelasan'], 'string', 'max' => 100],
            [['tahun', 'status', 'periode'], 'string', 'max' => 20],
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
            'tahun' => 'Tahun',
            'status' => 'Status',
            'periode' => 'Periode',
        ];
    }
}
