<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\product\ProductRecord;

class m150404_142136_add_products_test_data extends Migration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        
        for ($i = 0; $i < 15; $i++) {
            $product = new ProductRecord();
            $product->name = $faker->words(3, true);
            $product->image_url = \Faker\Provider\Image::imageUrl(80, 80);
            $product->price = \Faker\Provider\Base::randomFloat(2, 10, 100);
            $product->distributor_id = 1;
            
            $product->save();
            
            unset($product);
        }
    }

    public function down()
    {
        echo "m150404_142136_add_products_test_data cannot be reverted.\n";

        return false;
    }
}
