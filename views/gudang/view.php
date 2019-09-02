<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Nav;
use richardfan\widget\JSRegister;
use app\assets\QRcodeAsset;

QrcodeAsset::register($this);


$this->title = 'Detail '.$model->perangkat;
$this->params['breadcrumbs'][] = ['label' => 'Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="panel panel-default">
    <div class="panel-heading"><?= $model->perangkat ?>
    </div>
        <div class="panel-body">
        <div id="qrcode"></div>
        <?= DetailView::widget([
            'options' => ['class' => 'table table-striped table-bordered table-responsive padding-gridview'],
            'model' => $model,
            'attributes' => [
                'perangkat',
                'type',
                'idperangkat',
                'sn',
                'penyimpanan',
                'kondisi',
                'tglmasuk',
                'tglkeluar',
                'tglmasukdismantle',
                'tglkeluardismantle',
            ],
        ]) ?>
    </div>

    <h4 class="padding-tables">Riwayat Installasi/Dismantle</h4>
    <div class="table-responsive padding-tables">
        <table class="table table-striped table-bordered padding-gridview">
            <tr>
                <th>Lokasi</th>
                <th>Teknis</th>
                <th>Tanggal Installasi</th>
                <th>Tanggal Dismantle</th>
                <th>Keterangan</th>
            </tr>
            <?php foreach($model->dataInstallasi as $dataInstall) :?>
                <tr>
                    <td><?= $dataInstall->lokasi ?></td>
                    <td><?= $dataInstall->teknis ?></td>
                    <td><?= $dataInstall->tglinstall ?></td>
                    <td><?= $dataInstall->tgldismantle ?></td>
                    <td><?= $dataInstall->keterangan ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    
</div>

<?php JSRegister::begin(['position' => \yii\web\View::POS_READY]); ?>
<script>

var qrcode = new QRCode("qrcode", {
    text: window.location.href,
    width: 100,
    height: 100,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
});

</script>
<?php JSRegister::end(); ?>

