<?php
namespace app\assets;

use yii\web\AssetBundle;

class DatetimeAsset extends AssetBundle
{
    public $sourcePath = '@app/src/datetime';
    public $css = [
        'css/bootstrap-datetimepicker.min.css',
    ];
    public $js = [
        'js/bootstrap-datetimepicker.min.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
        'app\assets\MomentAsset',
    ];
}
