<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use \mdm\behaviors\ar\RelationTrait;

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
			[['id'], 'integer', 'max' =>11],
			[['perangkat','type','sn','penyimpanan','kondisi','tglmasuk','tglkeluar','tglmasukdismantle','tglkeluardismantle'],'string','max' => 100],
			['perangkat','required','message' => 'nama perangkat harus diisi'],
			['type','required','message' => 'type perangkat harus diisi'],
			['sn','required','message' => 'serial number perangkat harus diisi'],
			['penyimpanan','required','message' => 'rak harus diisi'],
			['kondisi','required','message' => 'lokasi perangkat harus diisi'],
			['tglmasuk','required','message' => 'lokasi perangkat harus diisi'],
			[['idperangkat'], 'autonumber', 'format'=>'DTN.'.date('Ymd').'-?', 'digit'=>4],
			// ['tglkeluar','required','message' => 'lokasi perangkat harus diisi'],
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

	public function behaviors()
	{
		return [
			[
				'class' => 'bahirul\yii2\autonumber\Behavior',
				'attribute' => 'idperangkat', // required
				'value' => 'DTN.'.date('Y-m-d').'.?' , // format auto number. '?' will be replaced with generated number or you can use " 'value' => function($event){ return 'SA.'.date('Y-m-d').'.?' } " as long the return value contain '?' character
				'digit' => 4 // optional, default to null. 
			],
		];
	}

	public function getDataInstallasi()
    {
        return $this->hasMany(Installasi::className(), ['gudang_id' => 'id']);
    }
}