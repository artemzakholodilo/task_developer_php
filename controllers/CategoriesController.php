<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\category\CategorySearchModel;

class CategoriesController extends Controller
{
    public function actionIndex() {
        $searchModel = new CategorySearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact(
                'searchModel', 
                'dataProvider'
                )
        );
    }
}
