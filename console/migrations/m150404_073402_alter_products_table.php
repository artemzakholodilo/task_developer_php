<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_073402_alter_products_table extends Migration
{
    public function up()
    {
        $this->addColumn("products", "image_url", "string");
    }

    public function down()
    {
        $this->dropColumn("products", ["image_url"]);
    }
}
