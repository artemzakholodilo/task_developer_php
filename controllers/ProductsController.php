<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\product\Product;
use app\models\product\ProductRecord;
use app\models\distributor\DistributorRecord;
use app\models\category\CategoryRecord;

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
    
    public function actionCreate() {
        $product = new Product();
        $categories = [];
        $distributors = [];
        
        if (    
                Yii::$app->request->isPost && 
                $this->load($product, Yii::$app->request->getBodyParams())
            ) 
        {
            var_dump($_FILES); exit;
            $this->createProduct($product, Yii::$app->request->bodyParams);
            $this->redirect(['index']);
        }
        
        foreach (CategoryRecord::getCategories() as $category) {
            $categories[$category->id] = $category->name;
        }
        
        foreach (DistributorRecord::getDistributors() as $distributor) {
            $distributors[$distributor->id] = $distributor->name;
        }
        
        return $this->render('add', compact('product' ,'categories', 'distributors'));
    }
    
    public function actionView($id) {
        $product = ProductRecord::findOne($id);

        if (!$product) {
            throw new \yii\web\HttpException("Page not found");
        }
        
        $distributor = DistributorRecord::findOne($product->distributor_id);
        
        return $this->render('view', compact('product', 'distributor'));
    }
    
    private function load(Product $product, $post) {
        return $product->load($post) && $product->validate();
    }
    
    private function createProduct(Product $product, array $post) {
        $productRecord = new ProductRecord();
        $productRecord->name = $product->name;
        $productRecord->price = $product->price;
        $productRecord->distributor_id = $post['distributor'];
        
        try {
            $productRecord->save();

            foreach ($post['category'] as $category) {
                $categoryRecord = \app\models\category\CategoryRecord::findOne([
                    'id' => $category
                ]);

                $productRecord->link('categories', $categoryRecord);

                unset($categoryRecord);
            }
        } catch (\yii\db\Exception $ex) {
            throw new \yii\web\HttpException($ex->getMessage());
        } catch (\yii\base\ErrorException $ex) {
            throw new \yii\web\HttpException($ex->getMessage(), 403);
        }
        
        return true;
        
    }
}