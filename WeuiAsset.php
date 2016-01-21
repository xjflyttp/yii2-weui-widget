<?php

namespace xj\weui;

use yii\web\AssetBundle;

/**
 * @author xjflyttp <xjflyttp@gmail.com>
 */
class WeuiAsset extends AssetBundle
{
    public $sourcePath = '@bower/weui/dist';
    public $basePath = '@webroot/assets';
    public $css = [
        'style/weui.css',
    ];
}
