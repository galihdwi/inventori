<?php
namespace app\assets;

use yii\web\AssetBundle;

class Select2Asset extends AssetBundle
{
    public $sourcePath = '@app/src/select2';
    public $css = [
        'css/select2.min.css',
    ];
    public $js = [
        'js/select2.min.js'
    ];
        public $depends = [
        'app\assets\AppAsset',
    ];
}
