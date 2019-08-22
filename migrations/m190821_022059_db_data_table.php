<?php

use yii\db\Migration;

/**
 * Class m190821_022059_db_data_table
 */
class m190821_022059_db_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}',[
            'id' => $this->primaryKey(),
            'username' => $this->string(100),
            'password' => $this->string(100),
            'accessKey' => $this->string(100),
            'nama' => $this->string(100),
            'email' => $this->string(100),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190821_022059_db_data_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_022059_db_data_table cannot be reverted.\n";

        return false;
    }
    */
}
