<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
 *
 * @property integer $id
 * @property string $orderid
 * @property string $kandidatid
 * @property string $status
 */
class Delivery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['orderid', 'kandidatid', 'status'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderid' => 'Orderid',
            'kandidatid' => 'Kandidatid',
            'status' => 'Status',
        ];
    }

    public function getKandidat()
    {
        return $this->hasOne(Kandidat::className(), ['kandidatid' => 'kandidatid']);
    }
}
