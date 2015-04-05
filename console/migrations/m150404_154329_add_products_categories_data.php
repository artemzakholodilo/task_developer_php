<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\category\CategoryRecord;
use app\models\product\ProductRecord;

class m150404_154329_add_products_categories_data extends Migration
{
    public function up()
    {
       $db = \Yii::$app->db;
       $products_min_id = $db->createCommand("SELECT min(id) FROM products")
                             ->queryScalar();
       $products_max_id = $db->createCommand("SELECT max(id) FROM products")
                             ->queryScalar();
       $categories_min_id = $db->createCommand("SELECT min(id) FROM categories")
                             ->queryScalar();
       $categories_max_id = $db->createCommand("SELECT max(id) FROM categories")
                             ->queryScalar();
       
       for ($i = $products_min_id; $i < $products_max_id; $i++) {
           $db->createCommand()
                   ->insert("products_categories", [
                       'product_id' => $i,
                       'category_id' => rand($categories_min_id, $categories_max_id),
                   ])
                   ->execute();
       }
    }

    public function down()
    {
        echo "m150404_154329_add_products_categories_data cannot be reverted.\n";

        return false;
    }
}
