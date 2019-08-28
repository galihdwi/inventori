<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Gudang;
use app\models\Carigudang;
use yii\data\ActiveDataProvider;

/**
 * 
 */
class GudangController extends Controller
{
	
	public function actionIndex()
	{
        $searchModel = new Carigudang();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 10];
        $dataProvider->sort = ['defaultOrder' => ['id' => 'DESC']]; 
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
	}

	public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

	public function actionCreate()
	{
		$model = new Gudang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('_form', [
            'model' => $model,
        ]);
	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->render('index',[
			'model' => $model,
		]);
	}

	protected function findModel($id)
	{
		if (( $model = Gudang::findOne($id)) !== null) {
			return $model;
		}
	}
}