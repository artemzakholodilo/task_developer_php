<?php
namespace app\modules\api;

use yii\base\Module;

class ApiModule extends Module
{
    public $controllerNamespace = 'app\\modules\\api\\controllers';
    
    public function init()
    {
        parent::init();
        
//        var_dump($this); exit;
    }
}
