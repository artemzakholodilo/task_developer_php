<?php
namespace app\models\category;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerRecord
 *
 * @author Artem
 */

use yii\db\ActiveRecord;
use app\models\product\ProductRecord;

class CategoryRecord extends ActiveRecord
{
    private static $categories = null;
    
    public static function tableName() {
        return "categories";
    }

    public function rules() {
        return [
            ['id', 'number'],
            ['name', 'required'],
            ['name', 'unique'],
            ['name', 'string', 'max' => 256],
        ];
    }
    
    public function getProducts() {
        return $this
                ->hasMany(ProductRecord::className(),
                    [
                        'id' => 'product_id'
                    ]
                )
                ->viaTable('products_categories',
                    [
                        'category_id' => 'id'
                    ]
                );
    }
    
    public static function getCategories() {
        if (is_null(self::$categories)) {
            self::$categories = self::find()->all();
        }
        
        return self::$categories;
    }

}