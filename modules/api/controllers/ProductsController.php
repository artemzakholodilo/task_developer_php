<?php
namespace app\modules\api\controllers;

use yii\rest\Controller;
//use yii\web\Controller;
use app\models\product\ProductRecord;

class ProductsController extends Controller
{
    public $modelClass = 'app\\models\\product\\ProductRecord';
    
//    public function init() {
//        parent::init();
//        
//        $this->modelClass = ProductRecord::className();
//    }

//    public function actionIndex() {
//        return "AAA";
//    }
}
