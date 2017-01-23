<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kandidat".
 *
 * @property integer $id
 * @property string $namalengkap
 * @property string $jenkel
 * @property string $status
 * @property string $tempatlahir
 * @property string $tanggallahir
 * @property string $alamat
 * @property string $kodepos
 * @property string $notelp
 * @property string $agama
 * @property string $namasekolah
 * @property string $jurusan
 * @property string $namacomp1
 * @property string $jabatan1
 * @property string $lamabkrj1
 * @property string $namacomp2
 * @property string $jabatan2
 * @property string $lamabkrj2
 * @property string $namacomp3
 * @property string $jabatan3
 * @property string $lamabkrj3
 * @property string $nmbpk
 * @property string $nmibu
 * @property string $pkrjortu
 * @property string $msoffice
 * @property string $photosh
 * @property string $autoca
 * @property string $others
 * @property string $inggris
 * @property string $mengemudi
 * @property string $sim
 * @property string $fotokandidat
 */
class Kandidat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kandidat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namalengkap','jabatan','fotokandidat'],'required'],
            [['tanggallahir'], 'safe'],
            [['alamat'], 'string'],
            [['namalengkap', 'tempatlahir', 'namasekolah', 'jurusan', 'nmbpk', 'nmibu', 'pkrjortu', 'fotokandidat'], 'string', 'max' => 100],
            [['jenkel', 'status', 'kodepos', 'agama', 'lamabkrj1', 'lamabkrj2', 'lamabkrj3', 'msoffice', 'photosh', 'autoca', 'inggris', 'mengemudi', 'sim'], 'string', 'max' => 20],
            [['notelp', 'namacomp1', 'jabatan1', 'namacomp2', 'jabatan2', 'namacomp3', 'jabatan3', 'others'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namalengkap' => 'Nama lengkap',
            'jenkel' => 'Jenis kelamin',
            'status' => 'Status',
            'tempatlahir' => 'Tempat lahir',
            'tanggallahir' => 'Tanggal lahir',
            'alamat' => 'Alamat',
            'kodepos' => 'Kodepos',
            'notelp' => 'No telp',
            'agama' => 'Agama',
            'namasekolah' => 'Nama sekolah',
            'jurusan' => 'Jurusan',
            'namacomp1' => 'Nama Perusahaan',
            'jabatan1' => 'Jabatan',
            'lamabkrj1' => 'Lama bkrj1',
            'namacomp2' => 'Namacomp2',
            'jabatan2' => 'Jabatan2',
            'lamabkrj2' => 'Lamabkrj2',
            'namacomp3' => 'Namacomp3',
            'jabatan3' => 'Jabatan3',
            'lamabkrj3' => 'Lamabkrj3',
            'nmbpk' => 'Nmbpk',
            'nmibu' => 'Nmibu',
            'pkrjortu' => 'Pkrjortu',
            'msoffice' => 'Msoffice',
            'photosh' => 'Photosh',
            'autoca' => 'Autoca',
            'others' => 'Others',
            'inggris' => 'Inggris',
            'mengemudi' => 'Mengemudi',
            'sim' => 'Sim',
            'fotokandidat' => 'Foto Kandidat',
        ];
    }
}
