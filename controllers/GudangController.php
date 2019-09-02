<?php

namespace app\controllers;

use Yii;
use app\models\Gudang;
use app\models\Carigudang;
use app\models\Installasi;;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\base\Model;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/**
 * 
 */
class GudangController extends \yii\web\Controller
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

    public function actionCreate()
    {
        $model = new Gudang();
        $modelDetails = [];

        $formDetails = Yii::$app->request->post('Installasi', []);
        foreach ($formDetails as $i => $formDetail) {
            $modelDetail = new Installasi(['scenario' => Installasi::SCENARIO_BATCH_UPDATE]);
            $modelDetail->setAttributes($formDetail);
            $modelDetails[] = $modelDetail;
        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $model->load(Yii::$app->request->post());
            $modelDetails[] = new Installasi(['scenario' => Installasi::SCENARIO_BATCH_UPDATE]);
            return $this->render('create', [
                'model' => $model,
                'modelDetails' => $modelDetails
            ]);
        }

        if ($model->load(Yii::$app->request->post())) {
            if (Model::validateMultiple($modelDetails) && $model->validate()) {
                $model->save();
                foreach($modelDetails as $modelDetail) {
                    $modelDetail->gudang_id = $model->id;
                    $modelDetail->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelDetails' => $modelDetails
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetails = $model->dataInstallasi;

        $formDetails = Yii::$app->request->post('Installasi', []);
        foreach ($formDetails as $i => $formDetail) {
            //loading the models if they are not new
            if (isset($formDetail['id']) && isset($formDetail['updateType']) && $formDetail['updateType'] != Installasi::UPDATE_TYPE_CREATE) {
                //making sure that it is actually a child of the main model
                $modelDetail = Installasi::findOne(['id' => $formDetail['id'], 'gudang_id' => $model->id]);
                $modelDetail->setScenario(Installasi::SCENARIO_BATCH_UPDATE);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[$i] = $modelDetail;
                //validate here if the modelDetail loaded is valid, and if it can be updated or deleted
            } else {
                $modelDetail = new Installasi(['scenario' => Installasi::SCENARIO_BATCH_UPDATE]);
                $modelDetail->setAttributes($formDetail);
                $modelDetails[] = $modelDetail;
            }

        }

        //handling if the addRow button has been pressed
        if (Yii::$app->request->post('addRow') == 'true') {
            $modelDetails[] = new Installasi(['scenario' => Installasi::SCENARIO_BATCH_UPDATE]);
            return $this->render('update', [
                'model' => $model,
                'modelDetails' => $modelDetails
            ]);
        }

        if ($model->load(Yii::$app->request->post())) {
            if (Model::validateMultiple($modelDetails) && $model->validate()) {
                $model->save();
                foreach($modelDetails as $modelDetail) {
                    //details that has been flagged for deletion will be deleted
                    if ($modelDetail->updateType == Installasi::UPDATE_TYPE_DELETE) {
                        $modelDetail->delete();
                    } else {
                        //new or updated records go here
                        $modelDetail->gudang_id = $model->id;
                        $modelDetail->save();
                    }
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        return $this->render('update', [
            'model' => $model,
            'modelDetails' => $modelDetails
        ]);

    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Gudang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
   
}