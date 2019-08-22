<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Gudang;

/**
 * 
 */
class GudangController extends Controller
{
	
	public function actionIndex()
	{
		return $this->render('index');
	}

	public function actionView($id)
	{
		# code...
	}

	public function actionCreate()
	{
		$model = new Gudang();
		return $this->render('create',[
			'model' => $model,
		]);
	}

	public function actionUpdate($id)
	{
		# code...
	}
}