<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * This is the model class for table "mitra".
 *
 * @property integer $id
 * @property string $mitraid
 * @property string $namamitra
 * @property string $alamatmitra
 * @property string $namapic
 * @property string $telppic
 * @property string $emailpic
 * @property string $deskripsi
 * @property string $status
 * @property string $lampiran
 */
class Mitra extends \yii\db\ActiveRecord
{
	//public $lampiran;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mitra';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['namamitra'], 'required'],
            [['mitraid', 'status'], 'string', 'max' => 10],
            [['namamitra', 'emailpic'], 'string', 'max' => 50],
            [['alamatmitra', 'deskripsi'], 'string', 'max' => 255],
            [['namapic'], 'string', 'max' => 100],
            [['telppic'], 'string', 'max' => 25],
			//[['lampiran'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'namamitra' => 'Namamitra',
            'alamatmitra' => 'Alamatmitra',
            'namapic' => 'Namapic',
            'telppic' => 'Telppic',
            'emailpic' => 'Emailpic',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
            'lampiran' => 'Lampiran',
        ];
    }
	/**
	public function upload()
    {
        if ($this->validate()) {
            $this->lampiran->saveAs('uploads/' . $this->lampiran->baseName . '.' . $this->lampiran->extension);
            return true;
        } else {
			
            return false;
        }
    }**/
}
