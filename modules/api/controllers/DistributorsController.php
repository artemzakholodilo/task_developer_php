<?php
namespace app\modules\api\controllers;

use yii\rest\Controller;
//use yii\web\Controller;
use app\models\distributor\DistributorSearchModel;

class DistributorsController extends Controller
{
    public $model;
    
    public function init() {
        parent::init();
        
        $this->model = DistributorSearchModel::className();
    }
    
    public function actionIndex() {
        return "aaaa";
    }
}
