<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\distributor\DistributorRecord;

class DistributorsController extends ActiveController
{
    public $modelClass;
    
    public function init() {
        $this->modelClass = DistributorRecord::className();
    }
}
