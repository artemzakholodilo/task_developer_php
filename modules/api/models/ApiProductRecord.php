<?php
namespace app\modules\api\models;

use Yii;
use app\models\product\ProductRecord;

class ApiProductRecord extends ProductRecord
{
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function searchByCategory($params) {
        $query = ProductRecord::find()
                ->joinWith('categories');
        
        $dataProvider = new ActiveDataProvider([
            "query" => $query,
            "pagination" => [
                'pageSize' => 12
            ]
        ]);
        
        if (!$this->load($params) && $this->validate()) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'categories.id' => isset($params['category']) ? $params['category'] : null 
        ]);
        
        return $dataProvider;
    }
}