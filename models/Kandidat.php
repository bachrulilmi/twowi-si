<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kandidat".
 *
 * @property integer $id
 * @property string $kandidatid
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
 * @property string $nama_kerabat
 * @property string $telp_kerabat
 * @property string $msoffice
 * @property string $photosh
 * @property string $autoca
 * @property string $others
 * @property string $inggris
 * @property string $mengemudi
 * @property string $sim
 * @property string $fotokandidat
 * @property string $jabatan
 * @property string $flag_interview
 * @property string $flag_member
 * @property string $flag_aktif
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
            [['namalengkap','jabatan','fotokandidat'], 'required'],
            [['tanggallahir'], 'safe'],
            [['alamat'], 'string'],
            [['kandidatid'], 'string', 'max' => 10],
            [['namalengkap', 'tempatlahir', 'namasekolah', 'jurusan', 'nmbpk', 'nmibu', 'pkrjortu', 'fotokandidat', 'jabatan'], 'string', 'max' => 100],
            [['jenkel', 'status', 'kodepos', 'agama', 'lamabkrj1', 'lamabkrj2', 'lamabkrj3', 'telp_kerabat', 'msoffice', 'photosh', 'autoca', 'inggris', 'mengemudi', 'sim', 'flag_interview', 'flag_member', 'flag_aktif'], 'string', 'max' => 20],
            [['notelp', 'namacomp1', 'jabatan1', 'namacomp2', 'jabatan2', 'namacomp3', 'jabatan3', 'nama_kerabat', 'others'], 'string', 'max' => 50],
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
            'namalengkap' => 'Namalengkap',
            'jenkel' => 'Jenkel',
            'status' => 'Status',
            'tempatlahir' => 'Tempatlahir',
            'tanggallahir' => 'Tanggallahir',
            'alamat' => 'Alamat',
            'kodepos' => 'Kodepos',
            'notelp' => 'Notelp',
            'agama' => 'Agama',
            'namasekolah' => 'Namasekolah',
            'jurusan' => 'Jurusan',
            'namacomp1' => 'Namacomp1',
            'jabatan1' => 'Jabatan1',
            'lamabkrj1' => 'Lamabkrj1',
            'namacomp2' => 'Namacomp2',
            'jabatan2' => 'Jabatan2',
            'lamabkrj2' => 'Lamabkrj2',
            'namacomp3' => 'Namacomp3',
            'jabatan3' => 'Jabatan3',
            'lamabkrj3' => 'Lamabkrj3',
            'nmbpk' => 'Nmbpk',
            'nmibu' => 'Nmibu',
            'pkrjortu' => 'Pkrjortu',
            'nama_kerabat' => 'Nama Kerabat',
            'telp_kerabat' => 'Telp Kerabat',
            'msoffice' => 'Msoffice',
            'photosh' => 'Photosh',
            'autoca' => 'Autoca',
            'others' => 'Others',
            'inggris' => 'Inggris',
            'mengemudi' => 'Mengemudi',
            'sim' => 'Sim',
            'fotokandidat' => 'Fotokandidat',
            'jabatan' => 'Jabatan',
            'flag_interview' => 'Flag Interview',
            'flag_member' => 'Flag Member',
            'flag_aktif' => 'Flag Aktif',
        ];
    }
}
