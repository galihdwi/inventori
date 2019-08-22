<?php

namespace app\models;

use Yii;
use yii\base\model;

/**
 * 
 */
class Gudang extends yii\db\ActiveRecord
{
	
	static function tableName()
	{
		return 'gudang';
	}

	public function rules()
	{
		return [
			[['perangkat','type','sn','rak','lokasi'],'string','max' => 100],
			['perangkat','required','message' => 'nama perangkat harus diisi'],
			['type','required','message' => 'type perangkat harus diisi'],
			['sn','required','message' => 'serial number perangkat harus diisi'],
			['rak','required','message' => 'rak harus diisi'],
			['lokasi','required','message' => 'lokasi perangkat harus diisi'],
		];
	}

	public function attributeLabel()
	{
		return [
			'perangkat' => 'Nama Perangkat',
			'type' => 'Type',
			'sn' => 'Serial number',
			'rak' => 'Rak',
			'lokasi' => 'Lokasi',
		];
	}
}