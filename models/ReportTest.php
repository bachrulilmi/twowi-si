<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_test".
 *
 * @property integer $id
 * @property integer $kandidatid
 * @property string $name_test
 * @property string $result_test
 * @property string $keterangan
 * @property string $flag_aktif
 */
class ReportTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kandidatid'], 'required'],
            [['kandidatid'], 'integer'],
            [['name_test'], 'string', 'max' => 50],
            [['result_test', 'flag_aktif'], 'string', 'max' => 20],
            [['keterangan'], 'string', 'max' => 100],
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
            'name_test' => 'Name Test',
            'result_test' => 'Result Test',
            'keterangan' => 'Keterangan',
            'flag_aktif' => 'Flag Aktif',
        ];
    }
}
