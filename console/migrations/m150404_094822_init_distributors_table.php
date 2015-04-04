<?php

use yii\db\Schema;
use yii\db\Migration;

class m150404_094822_init_distributors_table extends Migration
{
    public function up()
    {
        $this->createTable("distributors",
                [
                    'id' => 'pk',
                    'name' => 'string unique'
                ]
        );
    }

    public function down()
    {
        $this->dropTable("distributors");
    }
}
