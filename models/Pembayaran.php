<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property integer $id
 * @property string $kandidatid
 * @property string $tglbayar
 * @property string $nominal
 * @property string $picbayar
 * @property string $jenisbayar
 * @property string $viabayar
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tglbayar'], 'safe'],
            [['nominal'], 'number'],
            [['kandidatid'], 'string', 'max' => 20],
            [['picbayar', 'jenisbayar', 'viabayar'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kandidatid' => 'Kandidatid',
            'tglbayar' => 'Tglbayar',
            'nominal' => 'Nominal',
            'picbayar' => 'Picbayar',
            'jenisbayar' => 'Jenisbayar',
            'viabayar' => 'Viabayar',
        ];
    }
}
