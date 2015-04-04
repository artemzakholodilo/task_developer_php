<?php
namespace app\models\distributor;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class DistributorSearchModel extends DistributorRecord 
{
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params) {
        $query = parent::find();
        
        $dataProvider = new ActiveDataProvider([
            "query" => $query,
            "pagination" => [
                'pageSize' => 10
            ]
        ]);
        
        if (!$this->load($params) && $this->validate()) {
            return $dataProvider;
        }
        
        $query->andFilterWhere([
            'id' => $this->id
        ]);
        
        $query->andFilterWhere(['like', 'name', $this->name]);
        
        return $dataProvider;
    }
}