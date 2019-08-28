<?php

use yii\helpers\Html;

$this->title = 'Edit Perangkat';
$this->params['breadcrumbs'][] = ['label' => 'Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->render('_form', [
	'model' => $model,
]); ?>
