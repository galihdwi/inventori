<?php

use yii\db\Migration;

/**
 * Class m190821_054121_db_gudang_table
 */
class m190821_054121_db_gudang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->createTable('{{%gudang}}',[
            'id' => $this->primaryKey(),
            'perangkat' => $this->string(100),
            'type' => $this->string(100),
            'sn' => $this->string(100),
            'penyimpanan' => $this->string(100),
            'kondisi' => $this->string(100),
            'tglmasuk' => $this->string(100),
            'tglkeluar' => $this->string(100),
            'tglmasukdismantle' => $this->string(100),
            'tglkeluardismantle' => $this->string(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190821_054121_db_gudang_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_054121_db_gudang_table cannot be reverted.\n";

        return false;
    }
    */
}
