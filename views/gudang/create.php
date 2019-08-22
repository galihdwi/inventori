<?php

use yii\helpers\Html;
use yii\model\Gudang;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin([
	'layout' => 'horizontal',
]); ?>
	<?= $form->field($model, 'perangkat')->textInput()->label(false); ?>
	<?= $form->field($model, 'perangkat')->textInput()->label(false); ?>
	<?= $form->field($model, 'perangkat')->textInput()->label(false); ?>
	<?= $form->field($model, 'perangkat')->textInput()->label(false); ?>
<?php $form = ActiveForm::end(); ?>