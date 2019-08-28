<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gudang;

/**
 * 
 */
class Carigudang extends Gudang
{
	
	public function rules()
	{
		return [
			[['id'] , 'integer'],
			[['perangkat','type','idperangkat','sn','penyimpanan','kondisi','tglmasuk','tglkeluar','tglmasukdismantle','tglkeluardismantle'] , 'safe'],
		];
	}

	public function scenarios()
	{
		return model::scenarios();
	}

	public function search($params)
	{
		$query = Gudang::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (! $this->validate()) {
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id' => $this->id,
		]);

		$query->andFilterWhere(['like', 'perangkat', $this->perangkat])
			->andFilterWhere(['like', 'type', $this->type])
			->andFilterWhere(['like', 'idperangkat', $this->idperangkat])
			->andFilterWhere(['like', 'sn', $this->sn])
			->andFilterWhere(['like', 'penyimpanan', $this->penyimpanan])
			->andFilterWhere(['like', 'kondisi', $this->kondisi])
			->andFilterWhere(['like', 'tglmasuk', $this->tglmasuk])
			->andFilterWhere(['like', 'tglkeluar', $this->tglkeluar])
			->andFilterWhere(['like', 'tglmasukdismantle', $this->tglmasukdismantle])
			->andFilterWhere(['like', 'tglkeluardismantle', $this->tglkeluardismantle]);

		return $dataProvider;

	}
}