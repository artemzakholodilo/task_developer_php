<?php
namespace app\models\product;

use yii\db\ActiveRecord;
use app\models\category\CategoryRecord;

class ProductRecord extends ActiveRecord
{
    public static function tableName() {
        return "products";
    }

    public function rules() {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'string', 'max' => 256],
            [['price', 'image_url'], 'safe']
        ];
    }
    
    public function getCategories() {
        return $this
                ->hasMany(CategoryRecord::className(),
                    [
                        'id' => 'category_id'
                    ]
                )
                ->viaTable('products_categories',
                    [
                        'product_id' => 'id'
                    ]
                );
    }
    
}