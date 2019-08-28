<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\model\Gudang;

$this->title = 'Gudang';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="panel panel-default">
	<div class="panel-heading"><?= Html::encode($this->title) ?></div>
	<div class="panel-body">

		<div class="pull-right"><?= Html::a('<i class="glyphicon glyphicon-plus"></i> Perangkat', ['gudang/create'], ['class' => 'btn btn-primary']) ?></div>

		<div class="clear"></div>

		<div class="table-responsive">
			<?= GridView::widget([
				'tableOptions' => ['class' => 'table table-striped table-bordered'],
		        'dataProvider' => $dataProvider,
		        'filterModel' => $searchModel,
		        'columns' => [
		            ['class' => 'yii\grid\SerialColumn'],
		            'perangkat',
		            'sn',
		            'penyimpanan',
		            'kondisi',
		            ['class' => 'yii\grid\ActionColumn',
		            'template' => '<center>{view} {create} {update} {delete}</center>']
		        ],
		        'layout' => "{items}\n<center>{summary}\n{pager}</center>",
		    ]);

			?>
		</div>
	</div>
</div>
