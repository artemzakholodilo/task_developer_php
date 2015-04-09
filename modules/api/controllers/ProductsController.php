<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\product\ProductRecord;

class ProductsController extends ActiveController
{
    public $modelClass;
    
    public function init() {
        $this->modelClass = ProductRecord::className();
    }    
    
    public function actions() {
        $actions = parent::actions();
        
        $actions['view'] = [
            'class' => \app\modules\api\models\product\actions\ViewAction::className(),
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        
        return $actions;
    }
      
//    public function actionCategories() {
//        $id = \Yii::$app->request->queryParams['id'];
//        
//        $class = $this->modelClass;
//        
//        $model = $class::findOne($id);
//        
//        return $model->categories;
//    }
    
    public function actionView($id) {
        return json_encode(['id' => $id]);
    }
}
