<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_095355_alter_products_table extends Migration
{
    public function up()
    {
        $this->addColumn('products', 'distributor_id', 'integer');
    }

    public function down()
    {
        $this->dropColumn('products', 'distributor_id');
    }
}
