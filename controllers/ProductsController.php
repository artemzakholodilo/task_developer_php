<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\product\ProductRecord;
use app\models\distributor\DistributorRecord;

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
    
    public function actionView($id) {
        $product = ProductRecord::findOne($id);

        if (!$product) {
            throw new \yii\web\HttpException("Page not found");
        }
        
        $distributor = DistributorRecord::findOne($product->distributor_id);
        
        return $this->render('view', compact('product', 'distributor'));
    }
}