<?php

use yii\helpers\Html;
use yii\model\Gudang;
use yii\model\Installasi;
use yii\db\ActiveRecord;
use yii\bootstrap\ActiveForm;
use app\assets\DatetimeAsset;
use yii\web\JsExpression;
use richardfan\widget\JSRegister;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use mdm\widgets\GridInput;

DatetimeAsset::register($this);

?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">Data Perangkat</div>
        <div class="panel panel-body">
            <div class="col-sm-12">
                <?= $form->field($model, 'perangkat')->textInput() ?>
            </div>
            <div class="col-sm-6">
                <?= $form->field($model, 'type')->textInput() ?>
            </div> 
            <div class="col-sm-6">
                <?= $form->field($model, 'sn')->textInput() ?>
            </div> 
            <div class="col-sm-6">
                <?= $form->field($model, 'penyimpanan')->dropDownList(
                ['Gudang Detelnet' => 'Gudang Detelnet', 'Gudang Lingar Data' => 'Gudang Lingkar Data', 'Gudang Bawah Tangga' => 'Gudang Bawah Tangga']
             ) ?>
            </div> 
            <div class="col-sm-6">
                <?= $form->field($model, 'kondisi')->dropDownList(
                ['Baru' => 'Baru', 'Bekas' => 'Bekas']
             ) ?>
            </div> 
            <div class="col-sm-6">
                <?= $form->field($model, 'tglmasuk')->textInput(['class' => 'waktu form-control','options' => ['class' => 'float-right']]) ?>
            </div> 
            <div class="col-sm-6">
                <?= $form->field($model, 'tglkeluar')->textInput(['class' => 'waktu form-control']) ?>
            </div> 
        </div>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title pull-left">Installasi/Dismantle</h4>
            <div class="pull-right">
                <?= Html::submitButton('<i class="glyphicon glyphicon-plus"></i>', ['name' => 'addRow', 'value' => 'true', 'class' => 'btn btn-sm btn-info']) ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="container-items">
                <?php foreach ($modelDetails as $i => $modelDetail) : ?>
                    <div class="panel panel-default receipt-detail receipt-detail-<?= $i ?>">
                        <div class="panel-heading">
                            <h4 class="panel-title pull-left">Riwayat Installasi</h4>
                            <div class="pull-right">
                                <?= Html::button('<i class="glyphicon glyphicon-minus"></i>', ['class' => 'delete-button btn btn-sm btn-danger', 'data-target' => "receipt-detail-$i"]) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                if (! $modelDetail->isNewRecord) {
                                    echo Html::activeHiddenInput($modelDetail, "[{$i}]id");
                                }
                            ?>
                            <?= 

                            $form->field($modelDetail, "[{$i}]lokasi")->widget(Select2::classname(), [
                                'options' => [],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 1,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Pencarian tidak ditemukan'; }"),
                                    ],
                                    'ajax' => [
                                        'url' => 'http://crm.detelnetworks.id/index.php',
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q: params.term, r: "api/service-customer"}; }'),
                                        'processResults' => new JsExpression('function(data){return data;}')
                                    ],
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(lokasi) { return lokasi.text; }'),
                                    'templateSelection' => new JsExpression('function (lokasi) { return lokasi.text; }'),
                                ],
                                ]);
                            ?>
                                           
                            <div class="row">
                                <div class="col-sm-4"><?= $form->field($modelDetail, "[{$i}]teknis")->textInput([]) ?></div>
                                <div class="col-sm-8"><?= $form->field($modelDetail, "[{$i}]keterangan")->textInput([]) ?></div>
                            </div>
                            <div class="row">

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                <label class="control-label">Kegiatan</label>
                                    <select id="opsi" class="form-control" value="Installasi">
                                        <option id="install" value="install">Installasi</option>
                                        <option id="dismantle" value="dismantle">Dismantle</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelDetail, "[{$i}]tglinstall")->textInput(['id' => 'tglinstallasi','class' => 'waktu form-control']) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($modelDetail, "[{$i}]tgldismantle")->textInput(['id' => 'tgldismantle','class' => 'waktu form-control']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>




<?php JSRegister::begin(['position' => \yii\web\View::POS_READY]); ?>
<script>

	//JS untuk Date Time Picker
    $('.waktu').datetimepicker({ 
        format : 'DD/MM/YYYY HH:mm',
        showTodayButton: true,
    });

    $('#opsi').on('change',function(){
       if($(this).find('option:selected').text()=="Installasi")
            $("#tglinstallasi").attr('disabled',false),
            $("#tgldismantle").val(""),
            $("#tgldismantle").attr('disabled',true)
        }
    );

    $('#opsi').on('change',function(){
       if($(this).find('option:selected').text()=="Dismantle")
            $("#tgldismantle").attr('disabled',false),
            $("#tglinstallasi").val(""),
            $("#tglinstallasi").attr('disabled',true)
        }
    );

    $('.delete-button').click(function() {
        var detail = $(this).closest('.receipt-detail');
        var updateType = detail.find('.update-type');
        if (updateType.val() === " . json_encode(ReceiptDetail::UPDATE_TYPE_UPDATE) . ") {
            //marking the row for deletion
            updateType.val(" . json_encode(ReceiptDetail::UPDATE_TYPE_DELETE) . ");
            detail.hide();
        } else {
            //if the row is a new row, delete the row
            detail.remove();
        }

    });

</script>
<?php JSRegister::end(); ?>