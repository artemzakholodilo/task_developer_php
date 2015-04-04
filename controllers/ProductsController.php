<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\product\ProductRecord;

class ProductsController extends Controller
{
    public function actionIndex() {
        $searchModel = new \app\models\product\ProductSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categoriesProvider = (new \app\models\category\CategorySearchModel())
                ->search([]);

        return $this->render('index', compact(
                'searchModel', 
                'dataProvider',
                'categoriesProvider'
                )
        );
    }
}