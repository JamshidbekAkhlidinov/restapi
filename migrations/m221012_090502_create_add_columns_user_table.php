<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%add_columns_user}}`.
 */
class m221012_090502_create_add_columns_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}','access_token',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}','access_token');
        
    }
}
