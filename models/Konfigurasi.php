<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "konfigurasi".
 *
 * @property integer $id
 * @property string $items
 * @property string $nilai
 */
class Konfigurasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'konfigurasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['items', 'nilai'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'items' => 'Items',
            'nilai' => 'Nilai',
        ];
    }
}
