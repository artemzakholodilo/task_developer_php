<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_095355_alter_products_table extends Migration
{
    public function up()
    {
        $this->addColumn('products', 'distributor_id', 'integer');
        $this->addForeignKey('product_distributor', 
                'products', 'distributor_id', 'distributors', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('product_distributor', 'products');
        $this->dropColumn('products', 'distributor_id');
    }
}
