<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m221013_045206_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category}}');
    }
}
