<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * 
 */
class MomentAsset extends AssetBundle
{
	public $sourcePath = '@app/src/moment';
	public $js = ['moment.js'];
}