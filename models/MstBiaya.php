<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mst_biaya".
 *
 * @property integer $id
 * @property string $jenis_bayar
 * @property string $biaya
 */
class MstBiaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mst_biaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['biaya'], 'number'],
            [['jenis_bayar'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_bayar' => 'Jenis Bayar',
            'biaya' => 'Biaya',
        ];
    }
}
