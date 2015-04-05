<?php

use yii\db\Schema;
use yii\db\Migration;
use app\models\category\CategoryRecord;

class m150404_143956_add_categories_test_data extends Migration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $category = new CategoryRecord();
            $category->name = $faker->word;
            
            $category->save();
            
            unset($category);
        }
    }

    public function down()
    {
        echo "m150404_143956_add_categories_test_data cannot be reverted.\n";

        return false;
    }
}
