<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_074606_init_products_categories_table extends Migration
{
    public function up()
    {
        $this->createTable("products_categories",
                [
                    "id" => "pk",
                    "product_id" => "integer",
                    "category_id" => "integer",
                ]
        );
    }

    public function down()
    {
        $this->dropTable("products_categories");
    }
}
