<?php

use yii\helpers\Html;
use yii\model\Gudang;
use yii\db\ActiveRecord;
use yii\bootstrap\ActiveForm;
use app\assets\DatetimeAsset;
use richardfan\widget\JSRegister;
use kartik\select2\Select2;

DatetimeAsset::register($this);

$this->title = 'Tambah Perangkat';
$this->params['breadcrumbs'][] = ['label' => 'Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
	<div class="col-md-6">
		<div class="panel panel-default">
		    <div class="panel-heading"><?= Html::encode($this->title) ?></div>
		    <div class="panel-body">
		        <?php $form = ActiveForm::begin([
					'layout' => 'horizontal',
					'fieldConfig' => [
						'template' => "{label}<div class=\"col-sm-8\">{input}{error}</div>",
						],
				]); ?>
					<?= $form->field($model, 'perangkat')->textInput() ?>
					<?= $form->field($model, 'type')->textInput() ?>
					<?= $form->field($model, 'sn')->textInput() ?>
					<?= $form->field($model, 'penyimpanan')->textInput() ?>
					<?= $form->field($model, 'kondisi')->dropDownList(['Baru' => 'Baru', 'Bekas' => 'Bekas'],['prompt'=>'Kondisi']); ?>
					<?= $form->field($model, 'tglmasuk')->textInput(['id' => 'tglmasuk']) ?>
					<?= $form->field($model, 'tglkeluar')->textInput(['id' => 'tglkeluar']) ?>
					<div class="center">
						<?= Html::resetButton('Reset', ['class' => 'btn btn-sm btn-info']); ?>
						<?= Html::submitButton('Simpan',['class'=> 'btn btn-sm btn-primary']); ?>
					</div>   
				<?php $form = ActiveForm::end(); ?>
		    </div>
		</div>
	</div>
</div>

<?php JSRegister::begin(['position' => \yii\web\View::POS_READY]); ?>
<script>

	//JS untuk Date Time Picker
    $('#tglmasuk').datetimepicker({ 
        format : 'DD/MM/YYYY HH:mm',
        showTodayButton: true,
    });

    //JS untuk Date Time Picker
    $('#tglkeluar').datetimepicker({ 
        format : 'DD/MM/YYYY HH:mm',
        showTodayButton: true,
    });

</script>
<?php JSRegister::end(); ?>