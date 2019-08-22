<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class QrcodeAsset extends AssetBundle
{
    public $sourcePath = '@app/src/qrcode';
    public $js = [
        'qrcode.min.js',
        'jquery.min.js',
        // more plugin Js here
    ];
}
