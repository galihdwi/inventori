<?php

namespace app\models;

use Yii;

class Installasi extends \yii\db\ActiveRecord
{
    const UPDATE_TYPE_CREATE = 'create';
    const UPDATE_TYPE_UPDATE = 'update';
    const UPDATE_TYPE_DELETE = 'delete';

    const SCENARIO_BATCH_UPDATE = 'batchUpdate';


    private $_updateType;

    public function getUpdateType()
    {
        if (empty($this->_updateType)) {
            if ($this->isNewRecord) {
                $this->_updateType = self::UPDATE_TYPE_CREATE;
            } else {
                $this->_updateType = self::UPDATE_TYPE_UPDATE;
            }
        }

        return $this->_updateType;
    }

    public function setUpdateType($value)
    {
        $this->_updateType = $value;
    }

    public static function tableName()
    {
        return 'installasi';
    }

    public function rules()
    {
        return [
            ['updateType', 'required', 'on' => self::SCENARIO_BATCH_UPDATE],
            ['updateType',
                'in',
                'range' => [self::UPDATE_TYPE_CREATE, self::UPDATE_TYPE_UPDATE, self::UPDATE_TYPE_DELETE],
                'on' => self::SCENARIO_BATCH_UPDATE]
            ,
            [['lokasi','teknis','keterangan','tglinstall'], 'required'],
            ['gudang_id', 'required', 'except' => self::SCENARIO_BATCH_UPDATE],
            [['gudang_id'], 'integer'],
            [['lokasi','teknis','tglinstall','tgldismantle'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 300]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'teknis' => 'Teknis',
            'lokasi' => 'Lokasi Perangkat',
            'tglinstall' => 'Tanggal Installasi',
            'tgldismantle' => 'Tanggal Dismantle',
            'keterangan' => 'Keterangan',
        ];
    }

    public function getDataGudang()
    {
        return $this->hasOne(Gudang::className(), ['id' => 'gudang_id']);
    }
}
