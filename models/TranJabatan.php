<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tran_jabatan".
 *
 * @property integer $jabatanid
 * @property integer $kandidatid
 */
class TranJabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tran_jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jabatanid', 'kandidatid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jabatanid' => 'Jabatanid',
            'kandidatid' => 'Kandidatid',
        ];
    }
}
