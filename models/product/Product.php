<?php
namespace app\models\product;

use yii\base\Model;

class Product extends Model
{
    public $name;
    public $image_url;
    public $price;
    protected $path = "images/products/";
    
    public function rules() {
        return [
            [['name', 'price'], 'required'],
            [['name'], 'string', 'max' => 255],
//            [['image_url'], 'file', 'extensions' => 'gif, jpg, png'],
            [['name', 'price', 'image_url'], 'safe'],
        ];
    }
    
    public function getPath() {
        return $this->path;
    }
}
