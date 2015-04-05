<?php
namespace app\models\product;

use yii\base\Model;

class Product extends Model
{
    public $name;
    public $image_url;
    public $price;
    
    public function rules() {
        return [
            [['name', 'price'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name', 'price'], 'safe'],
        ];
    }
}
