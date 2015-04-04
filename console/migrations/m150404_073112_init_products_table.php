<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_073112_init_products_table extends Migration
{
    public function up()
    {
        $this->createTable("products", 
                [
                    "id" => "pk",
                    "name" => "string",
                    "price" => "double"
                ]
        );
    }

    public function down()
    {
        $this->dropTable("products");
    }
}
