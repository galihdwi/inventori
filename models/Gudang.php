<?php

namespace app\models;

use Yii;
use yii\base\model;
use yii\db\ActiveRecord;


/**
 * 
 */
class Gudang extends \yii\db\ActiveRecord
{
	
	static function tableName()
	{
		return 'gudang';
	}

	public function rules()
	{
		return [
			[['perangkat','type','idperangkat','sn','penyimpanan','kondisi','tglmasuk','tglkeluar','tglmasukdismantle','tglkeluardismantle'],'string','max' => 100],
			['perangkat','required','message' => 'nama perangkat harus diisi'],
			['type','required','message' => 'type perangkat harus diisi'],
			['sn','required','message' => 'serial number perangkat harus diisi'],
			['penyimpanan','required','message' => 'rak harus diisi'],
			['kondisi','required','message' => 'lokasi perangkat harus diisi'],
			['tglmasuk','required','message' => 'lokasi perangkat harus diisi'],
			['tglkeluar','required','message' => 'lokasi perangkat harus diisi'],
		];
	}

	public function attributeLabels()
	{
		return [
			'perangkat' => 'Nama Perangkat',
			'type' => 'Type',
			'idperangkat' => 'ID Perangkat',
			'sn' => 'Serial Number',
			'penyimpanan' => 'Penyimpanan',
			'kondisi' => 'Kondisi',
			'tglmasuk' => 'Tanggal Masuk',
			'tglkeluar' => 'Tanggal Keluar',
			'tglmasukdismantle' => 'Tanggal Masuk Dismantle',
			'tglkeluardismantle' => 'Tanggal Keluar Dismantle',
		];
	}
}