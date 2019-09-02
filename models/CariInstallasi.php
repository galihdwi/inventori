<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Installasi;


class CariInstallasi extends Installasi
{

    public function rules()
    {
        return [
            [['id', 'gudang_id'], 'integer'],
            [['lokasi', 'tglinstall', 'tgldismantle', 'keterangan'], 'safe'],
        ];
    }


    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Installasi::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'gudang_id' => $this->gudang_id,
        ]);

        $query->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'tglinstall', $this->tglinstall])
            ->andFilterWhere(['like', 'tgldismantle', $this->tgldismantle])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
