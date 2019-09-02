<?php

use yii\helpers\Html;
use yii\grid\GridView;


$this->title = 'Installasis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="installasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Installasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'gudang_id',
            'lokasi',
            'tglinstall',
            'tgldismantle',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
