<?php
namespace app\models\product;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ProductSearchModel extends ProductRecord 
{
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params) {
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
            'id' => $this->id,
            'price' => $this->price,
            'category' => $this->categories
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name]);
        
        return $dataProvider;
    }
}
