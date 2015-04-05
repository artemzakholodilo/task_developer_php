<?php
namespace app\models\product;

use Yii;
use yii\base\Model;

class ProductImage extends Model
{
    private $imageUrl;
    
    public static function loadImage($image) {
        $productImage = new self();
    }
    
    public function getImage() {
        return $this->imageUrl;
    }
    
    public function saveImage($name) {
        
    }
}
