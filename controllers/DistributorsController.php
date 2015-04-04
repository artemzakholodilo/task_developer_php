<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\distributor\DistributorSearchModel;

class DistributorsController extends Controller
{
    public function actionIndex() {
        $searchModel = new DistributorSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', compact(
                'searchModel', 
                'dataProvider'
                )
        );
    }
}
