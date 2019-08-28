<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php 
    
    $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'perangkat') ?>
    <?= $form->field($model, 'type') ?>
    <?= $form->field($model, 'idperangkat') ?>
    <?= $form->field($model, 'sn') ?>
    <?= $form->field($model, 'penyimpanan') ?>
    <?= $form->field($model, 'kondisi') ?>
    <?= $form->field($model, 'tglmasuk') ?>
    <?= $form->field($model, 'tglkeluar') ?>
    <?= $form->field($model, 'tglmasukdismantle') ?>
    <?= $form->field($model, 'tglkeluardismantle') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>
