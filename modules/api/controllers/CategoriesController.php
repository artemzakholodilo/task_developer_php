<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use app\models\category\CategoryRecord;

class CategoriesController extends ActiveController
{
    public $modelClass;
    
    public function init() {
        $this->modelClass = CategoryRecord::className();
    }
}
