<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_073603_init_categories_table extends Migration
{
    public function up()
    {
        $this->createTable("categories",
                [
                    "id" => "pk",
                    "name" => "string unique",
                ]
        );
    }

    public function down()
    {
        $this->dropTable("categories");
    }
}
