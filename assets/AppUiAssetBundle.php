<?php
namespace app\assets;

use yii\web\AssetBundle;

class AppUiAssetBundle extends AssetBundle
{
    public $sourcePath = "@app/assets/ui";
    
    public $js = [
        'js/main.js',
    ];
    
    public $css = [
        'css/main.css',
    ];
    
    public $depends = [];
}
